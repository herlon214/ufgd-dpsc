<?php

use Illuminate\Database\Seeder;

class ClassifiedsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values[] = [
            'name' => 'Imóveis'
        ];
        $values[] = [
            'name' => 'Veículos'
        ];
        $values[] = [
            'name' => 'Eletrônicos'
        ];
        $values[] = [
            'name' => 'Roupa'
        ];
        $values[] = [
            'name' => 'Móveis'
        ];
        $values[] = [
            'name' => 'Eletrodomésticos'
        ];


        DB::table('classifieds_categories')->insert($values);
    }
}
