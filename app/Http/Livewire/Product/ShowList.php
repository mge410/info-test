<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Livewire\Component;

class ShowList extends Component
{
    public $category;
    public $description;
    public $products;
    public $productCount;

    protected $listeners = ['loadProducts' => 'loadProducts'];

    public function loadProducts($categoryId)
    {
        $this->category = Category::findOrFail($categoryId);
        $this->products = $this->category->products;
        $this->description = $this->category->description;
        $this->productCount = $this->products->count();
    }

    public function render()
    {
        $this->products = $this->products ?? [];
        return view('livewire.product.show-list',
            ['category' => $this->category, 'products' => $this->products])
            ->extends('layouts.app');
    }
}
