<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColaboradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $unidadeId = rand(1, 100);
            $cargoId = rand(1, 10);

            DB::table('colaboradores')->insert([
                'unidade_id' => $unidadeId,
                'cargo_id' => $cargoId,
                'nome' => "Colaborador $i",
                'cpf' => "1234567890$i",
                'email' => "colaborador$i@example.com",
            ]);
        }
    }
}
