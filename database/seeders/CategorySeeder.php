<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 1; $i <= 10; $i++) {
        //     DB::table('categories')->insert([
        //         'title' => "Category $i",
        //         'slug' => Str::slug("Category $i"),
        //         'description' => "This is the description for Category $i.",
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        Category::factory()->count(10)->create();
    }
}
