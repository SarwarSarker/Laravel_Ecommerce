<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::create([
            'first_name' => 'user',
            'username' => 'user',
            'phone_no' => '0182345678',
            'email' => 'user@gmail.com',
            'street_address' => 'Uttara',
            'division_id' => '1',
            'district_id' => '1',
            'status' => '1',
            'ip_address' => request()->ip(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
