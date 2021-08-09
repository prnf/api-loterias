<?php

use Illuminate\Database\Seeder;

class LoteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loterias = [
            'megasena',
            'lotomania',
            'timemania',
            'diadesorte',
            'duplasena',
            'quina',
            'lotofacil',
            'supersete',
            'loteca',
        ];

        foreach($loterias as $nome){
            $now = date('Y-m-d H:i:s');
            DB::table('loterias')->insert([
                'nome' => $nome,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
        
    }
}
