<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('unidades')->insert([
                'nome_fantasia' => "Unidade $i",
                'razao_social' => "Razão Social $i",
                'cnpj' => "1234567890123$i",
            ]);
        }
    }
}
