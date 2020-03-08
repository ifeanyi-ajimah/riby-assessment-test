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
        //make sure to create them in this sequence bcos of the relationship between them.
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,50)->create();
        factory(App\Repo::class,30)->create();
        factory(App\Event::class,30)->create();
    }
}




