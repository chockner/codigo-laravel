<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

use Illuminate\Support\Facades\Mail;

use App\Mail\ContactMail;
use App\Mail\MensajeRecibido;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $mensaje = $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        Mail::to('chockner30052@gmail.com')->send(new MensajeRecibido($mensaje));
        return 'mensaje enviado';
    }
}
