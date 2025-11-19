<?php

use Database\Seeders\SentenceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(SentenceSeeder::class);
    }
}
