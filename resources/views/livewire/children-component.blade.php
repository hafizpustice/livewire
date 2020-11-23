<div>
    
   Hello {{ $contact->name }} {{ now() }}

   <button wire:click="$emitUp('foo')">Refress</button>
</div>
