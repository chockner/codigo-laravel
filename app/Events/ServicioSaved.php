<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServicioSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $servicio;

    public function __construct($servicio)
    {
        $this->servicio = $servicio;
    }
}
