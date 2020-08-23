<?php

use Illuminate\Database\Seeder;
use App\Salario;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salarios = [
            '0 - 1000 USD',
            '1000 - 2000 USD',
            '2000 - 4000 USD',
            'No Mostrar',
        ];

        foreach ($salarios as $salario) {
            Salario::create(['nombre' => $salario]);
        }
    }
}
