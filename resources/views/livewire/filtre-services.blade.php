<div>
    <div class="flex items-center gap-2">
        <input wire:model="query" wire:keyup.debounce="filter" type="text" placeholder="recherche" class="border px-2">
        <input type="number" name="max" id="max" wire:model="max" wire:keyup.debounce="filter">
        <select wire:model="type" wire:change="filter" name="select" id="">
            <option value="">Select</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
</div>
