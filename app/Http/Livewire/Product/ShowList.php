<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Livewire\Component;

class ShowList extends Component
{
    public $category;
    public $products;

    protected $listeners = ['loadProducts' => 'loadProducts'];

    public function loadProducts($categoryId)
    {
        $this->products = Category::findOrFail($categoryId)->products;
    }

    public function render()
    {
        $this->products = $this->products ?? [];
        return view('livewire.product.show-list',
            ['category' => $this->category, 'products' => $this->products])
            ->extends('layouts.app');
    }
}
