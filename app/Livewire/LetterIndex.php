<?php

namespace App\Livewire;

use App\Models\Letter;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class LetterIndex extends Component
{
    use WithFileUploads;

    public $home = true;
    public $isCreate = false;
    public $isUpdate = false;
    public $isDetail = false;
    public $selectedCategory;
    public $number;
    public $title;
    public $file;
    public $create, $update, $id;
    public $search;

    public function render()
    {
        $params = [
            'search' => $this->search
        ];

        $categories = Category::all();
        $letters = Letter::when($params['search'], function ($query) use ($params) {
            $query->where('title', 'like', '%' . $params['search'] . '%');
        })->get();
        return view('livewire.letter-index', compact('categories', 'letters'));
    }

    public function back()
    {
        $this->reset('selectedCategory', 'number', 'title', 'file', 'create', 'update', 'id');
        $this->home = true;
        $this->isCreate = false;
        $this->isUpdate = false;
        $this->isDetail = false;
    }

    public function tambah()
    {
        $this->home = false;
        $this->isCreate = true;
        $this->isUpdate = false;
        $this->isDetail = false;
    }

    public function ubah($id)
    {
        $this->home = false;
        $this->isCreate = false;
        $this->isUpdate = true;
        $this->isDetail = false;
        $this->file = null;

        $letter = Letter::findOrFail($id);
        $this->selectedCategory = $letter->category_id;
        $this->number = $letter->number;
        $this->title = $letter->title;
        $this->id = $id;
    }

    public function updatestore($id){
        $this->validate([
            'selectedCategory' => 'required',
            'number' => 'required',
            'title' => 'required',
        ]);

        if($this->file){
            $path = $this->file->store('letters', 'public');
            $letter = Letter::findOrFail($id);
            $letter->update([
                'number' => $this->number,
                'category_id' => $this->selectedCategory,
                'title' => $this->title,
                'path' => $path,
            ]);

            session()->flash('success', 'Letter updated successfully.');
            $this->back();
        }else{
            $letter = Letter::findOrFail($id);
            $letter->update([
                'number' => $this->number,
                'category_id' => $this->selectedCategory,
                'title' => $this->title,
            ]);

            session()->flash('success', 'Letter updated successfully.');
            $this->back();
        }
    }

    public function detail($id)
    {
        $this->home = false;
        $this->isCreate = false;
        $this->isUpdate = false;
        $this->isDetail = true;

        $letter = Letter::findOrFail($id);
        $this->selectedCategory = $letter->category_id;
        $selectedCategory = Category::findOrFail($this->selectedCategory);
        $this->selectedCategory = $selectedCategory->name;
        $this->number = $letter->number;
        $this->title = $letter->title;
        $this->create = $letter->created_at;
        $this->update = $letter->updated_at;
        $this->file = $letter->path;
        $this->id = $id;
    }

    public function download()
    {
        return response()->download(storage_path('app/public/'.$this->file));
    }

    public function store(){
        $this->validate([
            'selectedCategory' => 'required',
            'number' => 'required|unique:letters,number',
            'title' => 'required',
        ]);

        // dd($this->number, $this->selectedCategory, $this->title, $this->file);
        $path = $this->file->store('letters', 'public');

        Letter::create([
            'number' => $this->number,
            'category_id' => $this->selectedCategory,
            'title' => $this->title,
            'path' => $path,
        ]);

        session()->flash('success', 'Letter created successfully.');
        $this->reset('selectedCategory', 'number', 'title', 'file');
        $this->back();
    }

    public function destroy($id)
    {
        $letter = Letter::findOrFail($id)->delete();
        session()->flash('success', 'Letter deleted successfully.');
        $this->back();
    }
}
