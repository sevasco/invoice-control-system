<?php

use Illuminate\Database\Seeder;
use App\Seller;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Seller::class, 20)->create();
    }
}
