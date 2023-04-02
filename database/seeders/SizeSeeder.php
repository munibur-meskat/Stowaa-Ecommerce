<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::insert([
            ['name' => 'S', 'slug' => 's'],
            ['name' => 'M', 'slug' => 'm'],
            ['name' => 'L', 'slug' => 'l'],
            ['name' => 'XL', 'slug' => 'xl'],
            ['name' => 'XXL', 'slug' => 'xxl'],
        ]);
    }
}
