<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile')->middleware('auth');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile')->middleware('auth');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile')->middleware('auth');
    Route::get('/change/password', 'ChangePassword')->name('change.password')->middleware('auth');
    Route::post('/change/password', 'UpdatePassword')->name('change.password')->middleware('auth');
});

// Home Slide All Route
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

// About Page All Route
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
