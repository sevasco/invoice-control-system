<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('adminadmin'),
        ]);

        factory(User::class, 19)->create();
    }
}

