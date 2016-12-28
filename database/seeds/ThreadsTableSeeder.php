<?php

use Illuminate\Database\Seeder;
use App\Thread;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10) as $index)
        {
            Thread::create([
                'title' => $faker->sentence(5),
                'body' => $faker->paragraph(4),
                'category_id' => '1'
            ]);
        }
    }
}
