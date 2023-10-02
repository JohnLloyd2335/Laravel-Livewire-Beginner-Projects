<?php

use App\Livewire\Calculator;
use App\Livewire\CascadingDropdown;
use App\Livewire\Counter;
use App\Livewire\DataTable;
use App\Livewire\MultiImageUpload;
use App\Livewire\Registration;
use App\Livewire\Todo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('counter', Counter::class)->name('counter');
Route::get('calculator', Calculator::class)->name('calculator');
Route::get('todo', Todo::class)->name('todo');
Route::get('cascading-dropdown', CascadingDropdown::class)->name('cascading-dropdown');
Route::get('data-table', DataTable::class)->name('data-table');
Route::get('multi-image-upload', MultiImageUpload::class)->name('multi-image-upload');
Route::get('registration', Registration::class)->name('registration');

