<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateServicioRequest;
use Intervention\Image\Facades\Images;

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
                Storage::delete($servicio->image);
            }
            // Guarda la nueva imagen
            $servicio->image = $request->file('image')->store('images');
            $servicio->save();
        }

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
