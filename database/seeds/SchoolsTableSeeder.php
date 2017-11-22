<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
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
            
            DB::table('schools')->insert([

                'name' => str_random(12),

                'abbrev' => str_random(4)

            ]);

        }
    }
}
