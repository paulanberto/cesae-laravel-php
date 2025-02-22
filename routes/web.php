<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// rota home
Route::get('/home', [HomeController::class, 'index'])->name('home');


// rotas users
//rota para no futuro carregar uma tabela com todos os users
Route::get('/users', [UserController::class, 'allUsers'])->name('users.show');

Route::get('/add-users', [UserController::class, 'addUsers'])->name('users.add');

Route::post('/create-user', [UserController::class, 'createUser'])->name('users.create');



//rota para botão de ver, para acessar info um usuário
Route::get('/users/{id}', [UserController::class, 'viewUser'])->name('users.view');
//rota para botão de excluir, para excluir um usuário
Route::get('/delete-user/{id}', [UserController::class, 'deleteUserFromDB'])->name('users.delete');



//rota tasks
Route::get('/tasks', [TasksController::class, 'index'])->name('tasks')->middleware('auth');

Route::get('/view-task/{id}', [TasksController::class, 'viewTask'])->name('tasks.view');

Route::get('/delete-task/{id}', [TasksController::class, 'deleteTaskFromDB'])->name('tasks.delete');

Route::get('/add-task', [TasksController::class, 'addTasks'])->name('tasks.add');

Route::post('/create-tasks', [TasksController::class, 'createTasks'])->name('tasks.create')->middleware('auth');


//rota gifts
Route::get('/gifts', [GiftsController::class, 'allGifts'])->name('gifts.all');

Route::get('/view-gifts/{id}', [GiftsController::class, 'viewGifts'])->name('gifts.view');

Route::get('/delete-gifts/{id}', [GiftsController::class, 'deleteGiftsFromDB'])->name('gifts.delete');

Route::get('/add-gifts', [GiftsController::class, 'addGifts'])->name('gifts.add');

Route::post('/create-gifts', [GiftsController::class, 'createGifts'])->name('gifts.create');

Route::get('/edit-gifts/{id}', [GiftsController::class, 'editGifts'])->name('gifts.edit');

Route::put('/gifts/{id}', [GiftsController::class, 'updateGifts'])->name('gifts.update');


//rota dashboard
Route::get('/home-dashboard', [DashboardController::class, 'indexDashboard'])->name('home.dashboard')->middleware('auth');


//rota com paramentros
Route::get('/hello/{name}', function ($name) {
    return '<h1>Hello</h1>' . $name;
});

//rota fallback: cai aqui quando não encontra nenhuma rota com o url solicitado no frontend
Route::fallback(function () {
    return view('fallback');
});






//Notas:
//os nomes das rotas servem para se identificar as mesmas dentro do código com uma "key", como por exemplo para chamar no href