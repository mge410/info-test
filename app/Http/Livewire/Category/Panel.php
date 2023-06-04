<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Panel extends Component
{
    public $categories;

    public function loadProducts($categoryId){
        $this->emit('loadProducts', $categoryId);
    }

    public function render()
    {
        $this->categories = Category::whereNull('parent_id')->withCount('subcategory')->get();
        return view('livewire.category.panel', ['categories' => $this->categories]);
    }
}
