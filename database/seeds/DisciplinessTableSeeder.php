<?php

use Illuminate\Database\Seeder;

class DisciplinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 7; $i++) { 

            for($j = 0; $j<7; $j++){
                DB::table('disciplines')->insert([
                    'school_id'=>$i,
                    
                    'name' => str_random(8),
    
                    'abbrev' => str_random(4)
    
                ]); 
            }
            
            

        }
    }
}
