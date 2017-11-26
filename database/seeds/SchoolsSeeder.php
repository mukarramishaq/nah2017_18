<?php

use Illuminate\Database\Seeder;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('schools')->insert(['name'=>'SEECS','abbrev'=>'SEECS',]);
        DB::table('schools')->insert(['name'=>'NBS','abbrev'=>'NBS',]);
        DB::table('schools')->insert(['name'=>'SADA','abbrev'=>'SADA',]);
        DB::table('schools')->insert(['name'=>'SCME','abbrev'=>'SCME',]);
        DB::table('schools')->insert(['name'=>'S3H','abbrev'=>'S3H',]);
        DB::table('schools')->insert(['name'=>'SMME','abbrev'=>'SMME',]);
        DB::table('schools')->insert(['name'=>'AMC','abbrev'=>'AMC',]);
        DB::table('schools')->insert(['name'=>'NICE','abbrev'=>'NICE',]);
        DB::table('schools')->insert(['name'=>'CEME','abbrev'=>'CEME',]);
        DB::table('schools')->insert(['name'=>'MCE','abbrev'=>'MCE',]);
        DB::table('schools')->insert(['name'=>'PNEC','abbrev'=>'PNEC',]);
        
    }
}
