<?php

namespace App\Livewire;

use Livewire\Component;

class CategoryIndex extends Component
{
    public $home = true;
    public $isCreate = false;

    public function render()
    {
        return view('livewire.category-index');
    }

    public function home()
    {
        $this->home = true;
        $this->isCreate = false;
    }

    public function create()
    {
        $this->home = false;
        $this->isCreate = true;
    }
}
