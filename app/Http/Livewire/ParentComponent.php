<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ParentComponent extends Component
{
    public $names = ['hafiz','Sohan','Mahedi','Sobuj'];
    public $contacts;
    protected $listeners = ['foo'=>'$refresh'];

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    // public function refreshChildren()
    // {
    //     $this->emit('refreshChildren');
    // }

    public function removeContact($name)
    {
        Contact::whereName($name)->first()->delete();
        $this->contacts = Contact::all();
    }
    
    public function render()
    {
        return view('livewire.parent-component');
    }
}
