<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;

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
    return view('auth.login');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');*/

 
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
   // Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index' ])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index' ])->name('dashboard');
    
    
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index' ])->name('users');
    Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create' ])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UsersController::class, 'store' ])->name('users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UsersController::class, 'edit' ])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UsersController::class, 'update' ])->name('users.update');
    Route::get('/users/{user}', [App\Http\Controllers\UsersController::class, 'show' ])->name('users.show');
    Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy' ])->name('users.destroy');
    

    Route::get('/capitanias', [App\Http\Controllers\CapitaniaController::class, 'index' ])->name('capitanias');
    Route::get('/capitanias/create', [App\Http\Controllers\CapitaniaController::class, 'create' ])->name('capitanias.create');
    Route::post('/capitanias', [App\Http\Controllers\CapitaniaController::class, 'store' ])->name('capitanias.store');
    Route::get('/capitanias/{capitania}/edit', [App\Http\Controllers\CapitaniaController::class, 'edit' ])->name('capitanias.edit');
    Route::put('/capitanias/{capitania}', [App\Http\Controllers\CapitaniaController::class, 'update' ])->name('capitanias.update');
    Route::delete('/capitanias/{capitania}', [App\Http\Controllers\CapitaniaController::class, 'destroy' ])->name('capitanias.destroy');

    
    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index' ])->name('permissions');
    Route::get('/permissions/create', [App\Http\Controllers\PermissionController::class, 'create' ])->name('permissions.create');
    Route::post('/permissions', [App\Http\Controllers\PermissionController::class, 'store' ])->name('permissions.store');
    Route::get('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'show' ])->name('permissions.show');
    Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit' ])->name('permissions.edit');
    Route::put('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'update' ])->name('permissions.update');
    Route::delete('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy' ])->name('permissions.destroy');
    

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index' ])->name('roles');
    Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create' ])->name('roles.create');
    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store' ])->name('roles.store');
    Route::get('/roles/{role}', [App\Http\Controllers\RoleController::class, 'show' ])->name('roles.show');
    Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit' ])->name('roles.edit');
    Route::put('/roles/{role}', [App\Http\Controllers\RoleController::class, 'update' ])->name('roles.update');
    Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy' ])->name('roles.destroy');

    Route::get('/marinas', [App\Http\Controllers\MarinaController::class, 'index' ])->name('marinas');
    Route::get('/marinas/create', [App\Http\Controllers\MarinaController::class, 'create' ])->name('marinas.create');
    Route::post('/marinas', [App\Http\Controllers\MarinaController::class, 'store' ])->name('marinas.store');
    Route::get('/marinas/{marina}', [App\Http\Controllers\MarinaController::class, 'show' ])->name('marinas.show');
    Route::get('/marinas/{marina}/edit', [App\Http\Controllers\MarinaController::class, 'edit' ])->name('marinas.edit');
    Route::put('/marinas/{marina}', [App\Http\Controllers\MarinaController::class, 'update' ])->name('marinas.update');
    Route::delete('/marinas/{marina}', [App\Http\Controllers\MarinaController::class, 'destroy' ])->name('marinas.destroy');


});

/*
Route::get('enviar', ['as' => 'enviar', function () {
    $data = ['link' => 'http://styde.net'];
    Mail::send('emails.notification', $data, function ($message) {
        $message->from('email@styde.net', 'Styde.Net');
        $message->to('user@example.com')->subject('Notificación');
    });
    return "Se envío el email";
}]);
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');