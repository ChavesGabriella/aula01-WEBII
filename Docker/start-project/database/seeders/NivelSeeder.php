<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["nome" => "ENSINO MÉDIO INTEGRADO - TÉCNICO"],
            ["nome" => "GRADUAÇÃO - TECNÓLOGO"],
            ];
        DB::table('niveis')->insert($data);
    }
}
