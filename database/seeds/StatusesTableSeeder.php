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
            'name' => 'Pendiente de pago',
        ]);
        Status::create([
            'name' => 'Cancelada',
        ]);
        Status::create([
            'name' => 'Vencida',
        ]);
        Status::create([
            'name' => 'Anulada',
        ]);
    }
}
