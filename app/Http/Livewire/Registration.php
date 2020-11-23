<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Registration extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refresh' => '$refresh'];
    public $selectItem;
    public $action;
    public function render()
    {
        $contacts = Contact::latest()->paginate(3);
        return view('livewire.registration', compact('contacts'));

    }

    public function selectItem($selectItem, $action)
    {
        $this->selectItem = $selectItem;
        $this->action = $action;

        if ($action == 'delete') {
            $this->dispatchBrowserEvent('deleteToastModalShow');
        } else {
            $this->emit('getUpdateId', $selectItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function delete()
    {
        Contact::destroy($this->selectItem);
        $this->dispatchBrowserEvent('deleteToastModalHide');
    }
}
