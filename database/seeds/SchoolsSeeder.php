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
        DB::table('schools')->insert(['name'=>'AMC','abbrev'=>'AMC',]);
        DB::table('schools')->insert(['name'=>'ASAB','abbrev'=>'ASAB',]);
        DB::table('schools')->insert(['name'=>'CEME','abbrev'=>'CEME',]);
        DB::table('schools')->insert(['name'=>'C3A','abbrev'=>'C3A',]);
        DB::table('schools')->insert(['name'=>'CAE','abbrev'=>'CAE',]);
        DB::table('schools')->insert(['name'=>'MCE','abbrev'=>'MCE',]);
        DB::table('schools')->insert(['name'=>'MCS','abbrev'=>'MCS',]);
        DB::table('schools')->insert(['name'=>'NBS','abbrev'=>'NBS',]);
        DB::table('schools')->insert(['name'=>'PNEC','abbrev'=>'PNEC',]);
        DB::table('schools')->insert(['name'=>'RCMS','abbrev'=>'RCMS',]);
        DB::table('schools')->insert(['name'=>'S3H','abbrev'=>'S3H',]);
        DB::table('schools')->insert(['name'=>'SADA','abbrev'=>'SADA',]);
        DB::table('schools')->insert(['name'=>'SCEE-IESE','abbrev'=>'SCEE-IESE',]);
        DB::table('schools')->insert(['name'=>'SCEE-IGIS','abbrev'=>'SCEE-IGIS',]);
        DB::table('schools')->insert(['name'=>'SCEE-NICE','abbrev'=>'SCEE-NICE',]);
        DB::table('schools')->insert(['name'=>'SCEE-NIT','abbrev'=>'SCEE-NIT',]);
        DB::table('schools')->insert(['name'=>'SCME','abbrev'=>'SCME',]);
        DB::table('schools')->insert(['name'=>'SEECS','abbrev'=>'SEECS',]);
        DB::table('schools')->insert(['name'=>'SMME','abbrev'=>'SMME',]);
        DB::table('schools')->insert(['name'=>'SNS','abbrev'=>'SNS',]);
        DB::table('schools')->insert(['name'=>'USPCASE','abbrev'=>'USPCASE',]);
        
    }
}
