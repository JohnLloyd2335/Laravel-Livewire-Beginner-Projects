<div>
    <div class="mt-5 container-fluid">
        <h1 class="text-center">Data Table</h1>
        <div class="row mb-2 d-flex align-items-center justify-content-between">
            <div class="col-md-2 d-flex align-items-center justify-content-start gap-2 ">
                <label>Show</label>
                <select wire:model="perPage" wire:change="updatePerPage" class="form-control" style="width: 50px;">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                </select>
                <label>entries</label>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-start gap-2 ">
                <label>Order By</label>
                <select wire:model="orderBy" wire:change="updateOrderBy" class="form-control" style="width: 100px;">
                    <option selected value="ASC">ASC</option>
                    <option value="DESC">DESC</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-center justify-content-start gap-2 ">
                <label>Filter</label>
                <input type="number" class="form-control" wire:model.live.debounce.500ms="min" placeholder="MIN">
                <input type="number" class="form-control" wire:model.live.debounce.500ms="max" placeholder="MAX">
            </div>

            <div class="col-md-3 d-flex align-items-center justify-content-start gap-2 ">
                <input type="date" class="form-control" wire:model.live.debounce.500ms="start_date" >
                <input type="date" class="form-control" wire:model.live.debounce.500ms="end_date">
            </div>

            <div class="col-md-2 ">
                <input type="text" class="form-control" placeholder="Search...."
                    wire:model.live.debounce.200s="search">
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center fw-bold">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-2 d-flex align-items-center justify-content-between gap-5">
            @if ($products->total() && $products->total() > 10 && $products->total() > $products->perPage())
            <p>Showing {{ $products->perPage() }} of {{ $products->total() }}</p>
            @endif
            {{ $products->links() }}
        </div>
    </div>

</div>
