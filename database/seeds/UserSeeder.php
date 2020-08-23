<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jesús Ramírez',
            'email' => 'jesus.ra98@hotmail.com',
            'password' => Hash::make('jamon123'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Cristina Vázquez',
            'email' => 'cris@gmail.com',
            'password' => Hash::make('jamon123'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
