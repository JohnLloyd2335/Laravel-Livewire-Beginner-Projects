<div>
    <div class="container mt-5">
        <h1 class="text-center">Multi Image Upload</h1>
        <div class="row d-flex flex-column align-items-center justify-content-center">
            <form wire:submit.prevent="uploadImages">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($images)
                    Photo Preview:
                    <div class="row d-flex flex-wrap">
                        @foreach ($images as $images)
                            <div class="col-3">
                                <img src="{{ $images->temporaryUrl() }}" height="300" class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="my-2 row d-flex align-items-center justify-content-center">
                    <div class="col-8 d-flex align-items-center justify-content-center">
                        <input type="file" class="form-control" wire:model="images" multiple>
                        <div wire:loading wire:target="images">Uploading...</div>
                        @error('images.*')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i></button>
                    </div>
                </div>
                
                <div wire:loading wire:target="uploadImages">Processing...</div>
            </form>
        </div>

        <div class="row mt-5 d-flex justify-content-center flex-wrap gap-1 p-1">
            @forelse ($galleries as $gallery)
                <div class="col-lg-3 col-md-5 col-sm-12">
                    <img src="{{ asset('storage/'. $gallery->image_path) }}" height="50" class="img-fluid">
                </div>
            @empty
                <h1 class="text-center">No Photos Found</h1>
            @endforelse
            
        </div>

        <div class="row mt-2 ">
            <div class="col d-flex align-item-center justify-content-center p-1">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</div>
