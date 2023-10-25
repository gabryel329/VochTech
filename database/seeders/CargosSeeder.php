<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cargos = [
            'Cargo 1',
            'Cargo 2',
            'Cargo 3',
            'Cargo 4',
            'Cargo 5',
            'Cargo 6',
            'Cargo 7',
            'Cargo 8',
            'Cargo 9',
            'Cargo 10',
        ];

        foreach ($cargos as $cargo) {
            DB::table('cargos')->insert([
                'cargo' => $cargo,
            ]);
        }
    }
}
