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
           'country_name' => 'Sri Lanka',
           'slug' => 'sri-lanka',
           'longitude' => '79.88656520795877',
           'latitude' => '6.8917303799659955',
           'currency' => 'LKR',
           'user_id' => '1',
           'country_id' => 'LK',
           'country_manager' => '1',
           'features_flag' => '[]',
           'status' => 1,
           'features_manager' => null,
           'currency_rate' => '200',
           'phone_numbers' => '[{"number":"23544156562"},{"number":"3346452424"}]',
           'opening_hours' => 'Monday - Saturday from 08:00 to 20:00',
           'address' => '15, Colombo, Sri Lanka'
        ]);
    }
}
