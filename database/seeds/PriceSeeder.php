<?php

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            
            DB::table('prices')->insert([

                'alumni_price' => 1500,

                'guest_price' => 1000,
                'updated_by'=>'Mukarram Ishaq',
                'registration_type'=>'earlybird',
                'default'=>true,

            ]);
            DB::table('prices')->insert([
                
                'alumni_price' => 2000,

                'guest_price' => 1000,
                'updated_by'=>'Mukarram Ishaq',
                'registration_type'=>'regular',
                'default'=>false,

            ]);
    }
}
