<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizationController;

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


// Create Organization
Route::get('organizations/create', [OrganizationController::class, 'create'])->name('organizations.create');
Route::get('organizations/index', [OrganizationController::class, 'index'])->name('organizations.index');
Route::resource('organization', OrganizationController::class);

// Edit Organization
Route::get('organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
Route::put('organizations/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
Route::put('/organizations/{id}', 'OrganizationController@update')->name('organizations.update');


// Delete Organization
Route::delete('organizations/{organization}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contacts/{contact}/edit-form', [ContactController::class, 'editForm'])->name('contacts.edit-form');
    Route::get('/contacts/{contact}/delete-form', [ContactController::class, 'deleteForm'])->name('contacts.delete-form');
    Route::resource('contact', ContactController::class);

    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
