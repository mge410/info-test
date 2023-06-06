<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Destroy extends Component
{
    public $category;

    public function destroy()
    {
        DB::beginTransaction();
        try {
            $subcategories = Category::where('parent_id', '=', $this->category->id)->get();
            foreach ($subcategories as $subcategory)
            {
                $subcategory->delete();
            }
            $this->category->delete();
            DB::commit();
        } catch (\Exception $error) {
            DB::rollback();
        }

        $this->emit('updateCategoryList');
    }

    public function render()
    {
        return view('livewire.category.destroy');
    }
}
