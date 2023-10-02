<div>
    
    <div class="d-flex align-items-center justify-content-center flex-column mt-5 p-5 gap-4">
        <h1 class="text-center">Counter</h1>
       <div class="mt-5 d-flex align-items-center justify-content-center gap-4">
            <button wire:click="increment" class="btn btn-primary rounded">+</button>
            <h1>{{ $count }}</h1>
            <button wire:click="decrement" class="btn btn-primary rounded">-</button>
       </div>
    </div>
</div>
