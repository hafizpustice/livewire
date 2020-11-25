<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Registration extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refresh' => '$refresh','message'];
    public $selectItem;
    public $action;
    public $update='';
    public $messageShow=false;
    public $live_data;
    public $search;
    public function render()
    {
        if($this->search){
            $contacts = Contact::where ( 'name', 'LIKE', '%' . $this->search . '%' )->paginate(7);
            //dd($contacts);  
        }else{
            $contacts = Contact::latest()->paginate(3);
        }
        
        return view('livewire.registration', compact('contacts'));

    }

    public function updated($propertyName)
    {
        $this->live_data = $propertyName;
        $contacts = Contact::where ( 'name', 'LIKE', '%' . $this->search . '%' )->get();
    }

    public function message()
    {
        $this->messageShow = true;
        $this->update = 'Contract created successfully';
        $this->emit('messageRefresh');
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