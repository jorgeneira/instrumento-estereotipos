<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'region_id' => 8,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>COLOMBIANOS</strong> es...',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 3,
                'region_id' => 8,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>COLOMBIANOS</strong> es...',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 3,
                'region_id' => 3,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>COSTEÑOS</strong> es...',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 2,
                'region_id' => 2,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>BOGOTANOS</strong> es...',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 2,
                'region_id' => 6,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>SANTANDEREANOS</strong> es...',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 3,
                'region_id' => 7,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>LLANEROS</strong> es...',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 2,
                'region_id' => 1,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>PAISAS</strong> es...',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 3,
                'region_id' => 4,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>VALLUNOS</strong> es...',
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 3,
                'region_id' => 6,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>SANTANDEREANOS</strong> es...',
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 3,
                'region_id' => 5,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>BOYACENSES</strong> es...',
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 1,
                'region_id' => 5,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>BOYACENSES</strong> es...',
            ),
            11 => 
            array (
                'id' => 12,
                'category_id' => 2,
                'region_id' => 3,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>COSTEÑOS</strong> es...',
            ),
            12 => 
            array (
                'id' => 13,
                'category_id' => 1,
                'region_id' => 3,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>COSTEÑOS</strong> es...',
            ),
            13 => 
            array (
                'id' => 14,
                'category_id' => 3,
                'region_id' => 2,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>BOGOTANOS</strong> es...',
            ),
            14 => 
            array (
                'id' => 15,
                'category_id' => 1,
                'region_id' => 6,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>SANTANDEREANOS</strong> es...',
            ),
            15 => 
            array (
                'id' => 16,
                'category_id' => 3,
                'region_id' => 1,
                'text' => 'El <strong>ADJETIVO</strong> que mejor describe a los <strong>PAISAS</strong> es...',
            ),
            16 => 
            array (
                'id' => 17,
                'category_id' => 1,
                'region_id' => 1,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>PAISAS</strong> es...',
            ),
            17 => 
            array (
                'id' => 18,
                'category_id' => 1,
                'region_id' => 4,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>VALLUNOS</strong> es...',
            ),
            18 => 
            array (
                'id' => 19,
                'category_id' => 2,
                'region_id' => 8,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>COLOMBIANOS</strong> es...',
            ),
            19 => 
            array (
                'id' => 20,
                'category_id' => 2,
                'region_id' => 5,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>BOYACENSES</strong> es...',
            ),
            20 => 
            array (
                'id' => 21,
                'category_id' => 2,
                'region_id' => 4,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>VALLUNOS</strong> es...',
            ),
            21 => 
            array (
                'id' => 22,
                'category_id' => 2,
                'region_id' => 7,
                'text' => 'La <strong>COMIDA</strong> que más le gusta a los <strong>LLANEROS</strong> es...',
            ),
            22 => 
            array (
                'id' => 23,
                'category_id' => 1,
                'region_id' => 7,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>LLANEROS</strong> es...',
            ),
            23 => 
            array (
                'id' => 24,
                'category_id' => 1,
                'region_id' => 2,
                'text' => 'Lo que más le <strong>GUSTA HACER</strong> a los <strong>BOGOTANOS</strong> es...',
            ),
        ));
        
        
    }
}