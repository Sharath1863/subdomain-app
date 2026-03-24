<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

// 🔥 Subdomain FIRST
Route::domain('{username}.nulinz.co.in')->group(function () {

    Route::get('/', function ($username) {

        $user = User::where('subdomain', $username)->first();

        if (!$user) {
            abort(404, 'User not found');
        }

        return "Welcome " . $user->name;

    });

});

// Main domain AFTER
Route::get('/', function () {
    return "Main Domain (nulinz)";
});


// Registration
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);