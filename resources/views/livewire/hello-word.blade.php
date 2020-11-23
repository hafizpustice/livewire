<div>
    <input type="text" wire:model="name">
    <input type="checkbox" wire:model="loud">
    <select wire:model="gretting" multiple>
        <option>Hello</option>
        <option>Good Bye</option>
        <option>Good night</option>
    </select>
    {{ implode(', ',$gretting) }} {{ $name }} @if ($loud) ! @endif

    <form action="" wire:submit.prevent="resetName('bingo')">
        <button>Reset Name</button>
    </form>
  
</div>
