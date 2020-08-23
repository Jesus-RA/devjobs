<?php

use Illuminate\Database\Seeder;
use App\Ubicacion;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubicaciones = [
            'Remoto',
            'Estados Unidos',
            'Canada',
            'México',
            'Colombia',
            'Argentina',
            'España',
        ];

        foreach ($ubicaciones as $ubicacion) {
            Ubicacion::create(['nombre' => $ubicacion]);
        }
    }
}
