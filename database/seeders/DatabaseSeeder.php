<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // insert table category
        DB::table('categories')->insert([
            'categoryName' => 'makanan'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'olahraga'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'fashion'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'hewan'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'cars'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'teknologi'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'hutan'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'aestethic'
        ]);

        DB::table('categories')->insert([
            'categoryName' => 'animasi'
        ]);
    }
}
