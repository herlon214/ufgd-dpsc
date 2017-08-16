<?php

use Illuminate\Database\Seeder;

class DenouncesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values[] = [
            'name' => 'Conteúdo impróprio'
        ];
        $values[] = [
            'name' => 'É contra alguma lei'
        ];
        $values[] = [
            'name' => 'Palavras de baixo calão'
        ];


        DB::table('denounces_categories')->insert($values);
    }
}
