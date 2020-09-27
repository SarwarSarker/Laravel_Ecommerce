<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Payment::create([
            'name' => 'Cash',
            'priority' => '1',
            'short_name' => 'cash',
            'no' => '',
            'type' => '',
        ]);
        App\Models\Payment::create([
            'name' => 'Bkash',
            'priority' => '2',
            'short_name' => 'bkash',
            'no' => '01823456789',
            'type' => 'Personal',
        ]);
        App\Models\Payment::create([
            'name' => 'Rocket',
            'priority' => '3',
            'short_name' => 'rocket',
            'no' => '0193456789',
            'type' => 'Personal',
        ]);
    }
}
