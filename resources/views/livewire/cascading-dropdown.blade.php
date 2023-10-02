<div>
    <div class="container mt-5 px-5">
        <h1 class="text-center">Cascading Dropdown</h1>
        <div class="row f-flex align-items-center justify-content-center gap-2 flex-column px-5">
            <div class="col-12 px-5">
                <label>Continents</label>
                <select name="continents" class="form-control" wire:model="selectedContinent" wire:change="fetchCountries">
                    <option value="-1">Select Continent</option>
                    @foreach ($continents as $continent)
                        <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 px-5">
                <label>Countries</label>
                <select name="countries" class="form-control">
                    @forelse ($countries as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @empty
                        <option selected disabled>Select Continent First</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
</div>
