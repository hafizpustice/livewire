<div>
    @foreach ($contacts as $contact)
        @livewire('children-component', ['contact' => $contact],key($contact->name))
        <button wire:click="removeContact('{{ $contact->name }}')">Remove</button>
    @endforeach
  
    <hr>
     
     
     {{ now() }}
{{-- 
     <button wire:click="$emit('refreshChildren')">refresh children</button>  --}}
     <button wire:click="$emitUp('foo')">refresh children</button> 
</div>
