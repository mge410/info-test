<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class Edit extends Component
{
    public $category, $countSubcategory;
    public $title, $description, $parent_id;
    public $categoriesParents;
    public $formId;

    protected $rules = [
        'title' => ['required'],
        'description' => ['required'],
        'parent_id' => [],
    ];

    public function mount($category)
    {
        $this->formId = $category->id;
        $this->title = $category->title;
        $this->description = $category->description;
        $this->parent_id = $category->parent_id;
        $this->countSubcategory = $category->subcategory->count();
    }

    public function updated($propertyName)
    {
        $this->validateParentId();
        $this->validateOnly($propertyName);
    }

    public function validateParentId()
    {
        if ($this->countSubcategory !== 0) {
            $this->addError('parent_id', 'This category has subcategories!');
        }
    }

    public function edit()
    {
        $data = $this->validate();

        $this->category->update(
            $data
        );

        $this->emit('updateCategoryList');
        session()->flash('edit', 'Category changed successfully!');
    }

    public function render()
    {
        return view('livewire.category.edit', [
            'categoriesParents' => $this->categoriesParents,
        ]);
    }
}
