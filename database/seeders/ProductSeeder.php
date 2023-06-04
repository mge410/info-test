<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(150)->create();
        foreach (Category::all() as $category) {
            $productsId = $products->random(5)->pluck('id');
            $category->products()->attach($productsId);
        }
    }
}
