<?php

use App\Livewire\Cashier\Cashier;
use App\Livewire\Cashier\ShowReceipt;
use App\Livewire\Exports\Index;
use App\Livewire\Exports\Salereport;
use App\Livewire\Managment\Category\Cat;
use App\Livewire\Managment\Menu\Menu;
use App\Livewire\Managment\Table\Table;
use App\Livewire\Managment\Users\User;
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


Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function(){


//cahier
route::get('/cashier',Cashier::class);
route::get('/cashier/ShowReceipt/{id}',ShowReceipt::class);



});
Route::middleware(['auth', 'VerifyAdmin'])->group(function(){
    //management
    route::get('management',Cat::class);
    route::get('management/category',Cat::class);
    route::get('management/menu',Menu::class);
    route::get('management/table',Table::class);
    route::get('management/user',User::class);

    //report
    route::get('/report/index',Index::class);
});