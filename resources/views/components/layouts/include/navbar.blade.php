<div>
    <nav class="navbar navbar-expand-lg bg-dark text-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="{{ route('counter') }}">Livewire Projects</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa-solid fa-bars navbar-toggler-icon text-light"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary  {{ request()->routeIs('counter') ? 'text-light' : '' }}" aria-current="page" href="{{ route('counter') }}">Counter</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary {{ request()->routeIs('calculator') ? 'text-light' : '' }}" href="{{ route('calculator') }}">Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary {{ request()->routeIs('todo') ? 'text-light' : '' }}" href="{{ route('todo') }}">Todo</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary {{ request()->routeIs('cascading-dropdown') ? 'text-light' : '' }}" href="{{ route('cascading-dropdown') }}">Cascading Dropdown</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary {{ request()->routeIs('data-table') ? 'text-light' : '' }}" href="{{ route('data-table') }}">Data Table</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary {{ request()->routeIs('multi-image-upload') ? 'text-light' : '' }}" href="{{ route('multi-image-upload') }}">Multi Image Upload</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link text-secondary {{ request()->routeIs('registration') ? 'text-light' : '' }}" href="{{ route('registration') }}">Registration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
