<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Store extends Component
{
    public $title, $description, $parent_id;
    public $categoriesParents;
    public $formId;

    protected $rules = [
        'title' => ['required'],
        'description' => ['required'],
        'parent_id' => [],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $data = $this->validate();
        Category::create(
            $data
        );

        $this->emit('updateCategoryList');

        session()->flash('success', 'Category successfully created!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.category.store', [
            'categoriesParents' => $this->categoriesParents,
        ]);
    }
}
