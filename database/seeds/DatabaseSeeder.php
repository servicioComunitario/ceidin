<?php

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
        $this->call(GruposTableSeeder::class);
        $this->call(AccesosTableSeeder::class);
    }
}
