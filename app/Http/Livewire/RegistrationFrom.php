<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class RegistrationFrom extends Component
{
    protected $listeners = ['getUpdateId', 'forceColsedModal'];
    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
    ];

    public $name = '';
    public $email = '';
    public $firstTime = true;
    public $contactId;
    public $districts = [];
    //public $regions =[];
    public $region_id;
    public $district_id;
    public $hh;

    public function render()
    {
        // if(! empty($this->region_id)){
        if ($this->region_id == "Dhaka") {
            $this->districts = ['natore', 'abc', 'def'];
        } else if ($this->region_id == "rajshahi") {
            $this->districts = ['RAJ-1', 'ss2', 'ss3'];
        } else {
            $this->districts = ['ss1', 'ss2', 'ss3'];
        }

        //     $this->district_id = 'hi';
        //     //dd('yes');
        // }
        //dd('yes');
        $regions = ['Dhaka', 'rajshahi', 'sylhet'];
        //$this->districts = ['RAJ-1','ss2','ss3'];
        //dd($regions);
        $contacts = Contact::all();
        return view('livewire.registration-from', compact('contacts', 'regions'));

    }

    public function getUpdateId($contactId)
    {
        $this->contactId = $contactId;
        $modal = Contact::find($contactId);
        $this->name = $modal->name;
        $this->email = $modal->email;

    }

    public function updated($propertyName)
    {
        // $this->firstTime = false;
        $this->validateOnly($propertyName);
    }

    public function resetFrom()
    {
        $this->name = '';
        $this->email = '';

        $this->firstTime = true;
        $this->contactId = '';
    }
    public function forceColsedModal()
    {
        $this->resetFrom();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function saveContact()
    {
        $validatedData = $this->validate();
        if ($this->contactId) {
            Contact::find($this->contactId)->update($validatedData);
        } else {
            Contact::create($validatedData);
        }

        $contacts = Contact::all();
        $this->resetFrom();
        $this->emit('refresh');
        $this->emit('message');
        $this->dispatchBrowserEvent('closeModel');
        session()->flash('message', 'Contact added successfully updated.');

    }

}