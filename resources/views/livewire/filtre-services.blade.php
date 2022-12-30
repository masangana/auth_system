<div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input class="form-control" wire:model="query" wire:keyup.debounce="filter" type="text" placeholder="Recherche" class="border px-2">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <input class="form-control" type="number" name="max" id="max" wire:model="max" wire:keyup.debounce="filter" placeholder="Prix Max du Service">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" wire:model="type" wire:change="filter" name="select" id="">
                    <option value="">Select</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>    
    </div>
</div>
