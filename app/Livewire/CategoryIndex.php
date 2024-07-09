<?php

namespace App\Livewire;

use Livewire\Component;

class CategoryIndex extends Component
{
    public $home = true;
    public $isCreate = false;
    public $isUpdate = false;

    public function render()
    {
        return view('livewire.category-index');
    }

    public function back()
    {
        $this->home = true;
        $this->isCreate = false;
        $this->isUpdate = false;
    }

    public function create()
    {
        $this->home = false;
        $this->isCreate = true;
        $this->isUpdate = false;
    }

    public function update()
    {
        $this->home = false;
        $this->isCreate = false;
        $this->isUpdate = true;
    }
}
