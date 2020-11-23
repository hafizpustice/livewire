<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ChildrenComponent extends Component
{
    public $contact = '';
    public $ch = 'childeren';

    protected $listeners = [ 'refreshChildren' => 'refrshMe' ,'foo'=>'$refresh'];
   // protected $listeners = ['foo'=>'$refresh'];

    public function refrshMe()
    {
        
    }
    public function emitFoo()
    {
        $this->emitUp('foo');
    }
    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function render()
    {
        return view('livewire.children-component');
    }
}
