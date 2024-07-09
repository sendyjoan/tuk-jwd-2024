<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryIndex extends Component
{
    public $home = true;
    public $isCreate = false;
    public $isUpdate = false;
    public $id;
    public $name;
    public $description;
    public $search;

    public function render()
    {
        $params = [
            'search' => $this->search
        ];

        $categories = Category::when($params['search'], function ($query) use ($params) {
            $query->where('name', 'like', '%' . $params['search'] . '%');
        })->get();

        return view('livewire.category-index', compact('categories'));
    }

    public function fresh(){
        $this->home = true;
        $this->isCreate = false;
        $this->isUpdate = false;
    }

    public function back()
    {
        $this->home = true;
        $this->isCreate = false;
        $this->isUpdate = false;
        $this->reset('name', 'description');
    }

    public function create()
    {
        $this->home = false;
        $this->isCreate = true;
        $this->isUpdate = false;
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('success', 'Category deleted successfully.');
        $this->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;

        $this->home = false;
        $this->isCreate = false;
        $this->isUpdate = true;
    }

    public function update()
    {
        $id = $this->id;
        $this->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'description' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->categoryUpdated();
        $this->reset('name', 'description', 'id');
        $this->back();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable',
        ]);

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->categoryStored();
        $this->reset('name', 'description');
        $this->back();
    }

    public function categoryStored()
    {
        session()->flash('success', 'Category created successfully.');
    }

    public function categoryUpdated()
    {
        session()->flash('success', 'Category updated successfully.');
    }
}
