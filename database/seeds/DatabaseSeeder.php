<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DocumentTypesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(SellersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);

    }
}
