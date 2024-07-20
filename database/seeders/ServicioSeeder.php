<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("servicios")->insert([
            [
                "id" => 1,
                "titulo" => "Mantenimiento",
                "descripcion" => "Descripcion del servicio de Mantenimiento",
            ],
            [
                "id" => 2,
                "titulo" => "Afinamiento",
                "descripcion" => "Descripcion del servicio de Afinamiento",
            ],
            [
                "id" => 3,
                "titulo" => "Cambio de Aceite",
                "descripcion" => "Descripcion del servicio de Cambio de Aceite",
            ],
            [
                "id" => 4,
                "titulo" => "Lavado de tipo Salon",
                "descripcion" => "Descripcion del servicio de Lavado de tipo Salon",
            ],
        ]);
    }
}
