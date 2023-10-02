<div>
    <h1 class="text-center mt-5">Calculator</h1>
    <div class="row d-flex mt-5 align-items-center justify-content-center gap-2">
        <div class="col-3">
            <input wire:model="num1" type="text"  class="form-control">
        </div>
        <div class="col-3" >
           <select class="form-control" wire:model="action">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
           </select>
        </div>
        <div class="col-3">
            <input wire:model="num2" type="text"  class="form-control">
        </div>
        <div class="col-2">
            <button class="btn btn-primary"  wire:click="calculate">Calculate</button>
        </div>
        <div class="col-2 mt-5">
          <h1>{{ $result == 0 ? '0' : number_format($result,2) }}</h1>
        </div>
       
    </div>
</div>
