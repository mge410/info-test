<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->make();
        foreach ($categories as $category)
        {
            $category->parent_id = Category::whereNull('parent_id')->inRandomOrder()->first()->id;
            $category->save();
        }
    }
}
