<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@aguascalientes.tecnm.mx',
            'password' => Hash::make('tO29l$4.<8V@'),
        ]);
        
        User::create([
            'name' => 'Iraam Antonio López Salas',
            'email' => 'diplomado_asic@aguascalientes.tecnm.mx',
            'password' => Hash::make('07.5fRVVsWDC'),
        ]);
    }
}
