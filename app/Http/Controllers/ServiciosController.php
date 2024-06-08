<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Models\Servicio;

class ServiciosController extends Controller
{

    public function index()
    {
        //$servicios = DB::table('servicios')->get();

        //$servicios = Servicio::get();
        $servicios = Servicio::latest()->paginate(2);

        return view('servicios', compact('servicios'));

    }

    public function show($id)
    {
        /* return Servicio::find($id); */
        return view('show', [
            'servicio' => Servicio::find($id)
        ]);
    }
}
