<?php

namespace App\Listeners;

use App\Events\ServicioSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Laravel\Facades\Image;

class OptimizeServicioImage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ServicioSaved $event)
    {
        $servicio = $event->servicio;
        // Lógica para optimizar la imagen del servicio
        $image = Image::read(storage_path('app/public/' . $servicio->image));
        $image->resize(1500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save();
    }
}
