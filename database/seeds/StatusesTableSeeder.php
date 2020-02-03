<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Issued',
        ]);
        Status::create([
            'name' => 'Cancelled',
        ]);
        Status::create([
            'name' => 'Expired',
        ]);
        Status::create([
            'name' => 'Voided',
        ]);
    }
}
