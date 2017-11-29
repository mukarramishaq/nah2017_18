<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bank')->insert([
            'bank_name'=>'Habib Bank Limited (HBL)',
            'bank_account_name'=>'NUST Alumni Support & Activities',
            'bank_account_number'=>'22927000804103',
            'bank_branch'=>'NUST, H-12 Sector, Islamabad',
        ]); 
    }
}
