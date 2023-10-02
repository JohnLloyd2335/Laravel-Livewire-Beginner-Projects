<div>
    <div class="container mt-5">
        <div class="card shadow-lg px-5 py-5">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form wire:submit="register" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <input  wire:click="toggleRole" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" {{ $role == "JobSeeker" ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Job Seeker
                    </label>
                </div>
                <div class="col-3">
                    <input  wire:click="toggleRole" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" {{ $role == "Employer" ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                       Employer
                    </label>
                </div>
            </div>

            <div class="row my-2">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Email</label>
                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Password</label>
                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Confirm Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Avatar</label>
                        <input type="file"  accept=".png,.jpeg,.jpg" wire:model="avatar" class="form-control @error('avatar') is-invalid @enderror">
                        @error('avatar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        
                        @if ($avatar)
                            <p class="lead">Avatar Preview:</p>
                            <img src="{{ $avatar->temporaryUrl() }}"  class="img-fluid" height="30">
                        @endif
                    </div>
                </div>
                {{-- Only Visible if Role is Employer --}}
                @if ($role == 'Employer')
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Company</label>
                        <input type="text" wire:model="company_name" class="form-control @error('company_name') is-invalid @enderror">
                        @error('company_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Company Address</label>
                        <input type="text" wire:model="company_address" class="form-control @error('company_address') is-invalid @enderror">
                        @error('company_address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif
            </div>

            <div class="row my-2">
                <div class="col d-flex align-items-center justify-content-end">
                    <button wire:loading.remove wire:target="register" class="btn btn-primary">Register</button>
                    <p wire:loading wire:target="register">Submiting...</p>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
