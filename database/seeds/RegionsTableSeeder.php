<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('regions')->delete();
        
        \DB::table('regions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PAISAS',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'BOGOTANOS',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'COSTEÑOS',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'VALLUNOS',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'BOYACENSES',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'SANTANDEREANOS',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'LLANEROS',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'COLOMBIANOS',
            ),
        ));
        
        
    }
}