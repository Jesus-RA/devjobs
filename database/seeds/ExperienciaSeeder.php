<?php

use Illuminate\Database\Seeder;
use App\Experiencia;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiencias = [
            '0 - 6 Meses',
            '6 Meses - 1 Año',
            '1 - 3 Años',
            '3 - 5 Años',
            '5 - 7 Años',
            '7 - 10 Años',
            '10 - 12 Años',
            '12 - 15 Años',
        ];

        foreach ($experiencias as $experiencia) {
            Experiencia::create(['nombre' => $experiencia]);
        }
    }
}
