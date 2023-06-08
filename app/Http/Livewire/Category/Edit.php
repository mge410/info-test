<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
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
        if (is_array($data['parent_id']))
        {
            $data['parent_id'] = $data['parent_id']['value'];
        }
        if ($data['parent_id'] == '')
        {
            $data['parent_id'] = null;
        }

        $this->category->update(
            $data
        );

        session()->flash('edit', 'Category changed successfully!');
    }

    public function render()
    {
        $this->categoriesParents = Category::whereNull('parent_id')->withCount('subcategory')->get();

        return view('livewire.category.edit', [
            'categoriesParents' => $this->categoriesParents,
        ]);
    }
}
