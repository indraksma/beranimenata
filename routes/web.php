<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\EducationPage;
use App\Livewire\FutureMapForm;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/peta-masa-depan', FutureMapForm::class)->name('future-map');
Route::get('/edukasi', EducationPage::class)->name('education');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/admin', Dashboard::class)->name('admin.dashboard');
});
