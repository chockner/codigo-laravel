<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servicio;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateServicioRequest;

use Intervention\Image\Laravel\Facades\Image;

use App\Events\ServicioSaved;

class ServiciosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('create', 'edit');
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::get();

        return view('servicios', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicioRequest $request)
    {
        $servicio = new Servicio($request->validated());
        $servicio->image = $request->file('image')->store('images');
        $servicio->save();

        return redirect()->route('servicios.index')->with('estado', 'Servicio creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('show', [
            'servicio' => Servicio::find($id)
        ]);
    }
    public function edit(Servicio $servicio)
    {
        return view('edit', compact('servicio'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        // Si se ha subido una nueva imagen
        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si existe
            if ($servicio->image) {
                Storage::delete('public/' . $servicio->image);
            }

            // Procesa y guarda la nueva imagen
            $image = $request->file('image');
            $filename = $image->hashName();

            // Redimensiona la imagen y limita los colores
            $processedImage = Image::read($image)
                /* ->resize(800) */ // Cambia el ancho, puedes ajustarlo según tus necesidades
                /* ->limitColors(255) */
                ->encode();

            // Guarda la imagen procesada
            Storage::put('public/images/' . $filename, $processedImage);
            $servicio->image = 'images/' . $filename;
        }

        $servicio->titulo = $request->titulo;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        // Disparar el evento después de guardar el servicio
        ServicioSaved::dispatch($servicio);

        return redirect()->route('servicios.show', $servicio->id)
            ->with('estado', 'Servicio actualizado con éxito');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
