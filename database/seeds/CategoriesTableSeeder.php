<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'comportamiento',
                'text_template' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>{REGION}</strong> es...',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'comida',
                'text_template' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>{REGION}</strong> es...',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'cualidad',
                'text_template' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>{REGION}</strong> es...',
            ),
        ));
        
        
    }
}