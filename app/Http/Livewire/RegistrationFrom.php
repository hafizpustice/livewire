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

    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.registration-from', compact('contacts'));
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
        $this->firstTime = false;
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