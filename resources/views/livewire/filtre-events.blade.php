<div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input class="form-control" wire:model="query" wire:keyup.debounce="filter" type="text" placeholder="Recherche" class="border px-2">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <input class="form-control" type="date" name="start_date" id="start_date" wire:model="start_date" wire:keyup.debounce="filter" placeholder="Prix Max du Service">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <input class="form-control" type="date" name="end_date" id="end_date" wire:model="end_date" wire:keyup.debounce="filter" placeholder="Prix Max du Service">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control" wire:model="category" wire:change="filter" name="select" id="">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>    
    </div>
</div>
