<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder {
   
    public function run(): void {

        $data = [
            [   
                "nome" => "GABRIELLA SOEIRO CHAVES ALVES",
                "cpf" => "000.000.000-01",
                "email" => "gabriellasoeirooo@gmail.com", 
                "password" => Hash::make('123gabriella123'), 
                "user_id" => 2,
                "curso_id" => 2,
                "turma_id" => 6,
            ],
        ];
        DB::table('alunos')->insert($data);
    }
}