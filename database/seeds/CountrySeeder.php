<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
           'country_name' => 'LK',
           'slug' => 'sri-lanka',
           'currency' => 'LKR ',
           'user_id' => '1',
           'country_id' => 'LK',
           'country_manager' => '1',
           'features_flag' => '[]',
           'status' => 1,
           'features_manager' => '[]',
        ]);
    }
}
