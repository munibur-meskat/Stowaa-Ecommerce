<?php

namespace Database\Seeders\aa\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            // CategorySeeder::class,
            // ColorSeeder::class,
            // SizeSeeder::class,
            // ProductSeeder::class,
            // UserMetaSeeder::class,
        ]);
    }
}
