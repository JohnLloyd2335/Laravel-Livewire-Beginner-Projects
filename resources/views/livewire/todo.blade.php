<div>
    <div class="container mt-5">
        <h1 class="text-center">Todo List</h1>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <!-- Add To-Do Item -->
                <div class="input-group mb-3 gap-2">
                    <input wire:model='title'  name='title' type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Add a new todo" id="newTodo">
                    <div class="input-group-append">
                        <button wire:click='addTodo'class="btn btn-primary" id="addTodo"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <!-- To-Do List -->
                <ul wire:poll class="list-group">
                    @forelse ($todos as $todo)
                        <li wire:key="{{ $todo->id }}" class="list-group-item d-flex justify-content-between align-items-center">
                            <input {{ $todo->is_completed ? 'checked' : '' }} wire:click="toggleCompleted({{ $todo }})" type="checkbox" class="form-check-input p-2 border border-secondary">
                            <span class="{{ $todo->is_completed ? 'text-decoration-line-through' : '' }} fw-bold">{{ $todo->title }}</span>
                            <button wire:click="deleteTodo({{ $todo }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </li>
                    @empty
                        <li class="list-group-item text-center fw-bold">No Todo Item Found</li>
                    @endforelse
                    
                </ul>
            </div>
        </div>
    </div>
</div>
