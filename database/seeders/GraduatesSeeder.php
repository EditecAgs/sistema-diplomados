<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Graduate;


class GraduatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Graduate::create([
            'name' => 'Diplomado en Diseño de Circuitos Integrados de Aplicación Específica (ASICs)',
            'shortname_moodle' => 'DipASIC/2026A',
            'initial_date' => '2026-04-13',
            'finished_date' => '2026-09-01'
        ]);
        
    }
}
