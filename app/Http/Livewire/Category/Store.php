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
        if (is_array($data['parent_id']))
        {
            $data['parent_id'] = $data['parent_id']['value'];
        }
        Category::create(
            $data
        );

        session()->flash('success', 'Category successfully created!');
        $this->emit('updateCategoryList');
    }

    public function render()
    {
        $this->categoriesParents = Category::whereNull('parent_id')->withCount('subcategory')->get();

        return view('livewire.category.store', [
            'categoriesParents' => $this->categoriesParents,
        ]);
    }
}
