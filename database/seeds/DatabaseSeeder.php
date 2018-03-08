<?php

use App\Client;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create(['email'=>'loro102@gmail.com']);
        factory(User::class,50)->create();
        factory(Client::class,10)->create();
    }
}
