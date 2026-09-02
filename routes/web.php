<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\OficinaController;
use App\Models\User;


Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/teste-orm', function (){
    User::create([
        'name' => 'Ana Clara Santos',
        'email' => 'anaclara.santos@escola.sp.gov.br',
        'password' => '12345678'
    ]);

    return User::all();
});

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);


