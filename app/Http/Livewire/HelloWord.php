<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWord extends Component
{
    public $name = 'Hafiz';
    public $loud = false;
    public $gretting = ['Good Bye'];

    public function moun($name)
    {
        $this->name = $name;
    }
    public function updating()
    {
        $this->name = 'updating';
    }
    public function updated()
    {
        $this->name = strtoupper($this->name);
    }
    public function resetName($name = 'chiko')
    {
        $this->name = $name;
    }
    public function render()
    {
        return view('livewire.hello-word');
    }
}
