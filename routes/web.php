<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\App\Index;
use App\Livewire\App\CarView;
use App\Livewire\App\CheckoutView;
use App\Livewire\App\MyOrdersView;
use App\Livewire\App\OrderDetailsView;
use App\Livewire\App\SearchView;
use App\Livewire\App\ShopView;
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
Route::get('/', Index::class);

Route::get('/shop', ShopView::class);

Route::get('/car/{id}/{slug}', CarView::class);

Route::get('/search/car/{search}', SearchView::class);

Route::get('my-orders', MyOrdersView::class)->middleware('auth');

Route::get('/my-orders/details/{id}', OrderDetailsView::class)->middleware('auth');

Route::get('/checkout', CheckoutView::class)->middleware('auth');









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
