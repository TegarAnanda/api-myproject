<?php

use Illuminate\Database\Seeder;
use App\Thread;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thread::truncate();

        Eloquent::unguard();

        $this->call('ThreadsTableSeeder');
        // $this->call(UsersTableSeeder::class);
    }
}
