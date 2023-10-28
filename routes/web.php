<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Resources\TestListResource;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddTestRecordController;
use App\Http\Controllers\StandardController;

use Laravel\Fortify\RoutePath;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/add_test_record', AddTestRecordController::class)->name('add_test_record');

    Route::get('/test-list', function () {
        return  ['data'=> (new TestListResource())->toArray(request())];
    })->name('test-list');

    Route::controller(StandardController::class)->group(function () {
        Route::post('/', 'store')->name('test_record_store');
        Route::put('/{test}', 'update')->name('test_record_update');
        Route::delete('/{test}', 'destroy')->name('test_record_delete');
    })->middleware('role:standard');

    Route::controller(StandardController::class)->group(function () {
        Route::put('/{test}', 'update')->name('test_record_update');
    })->middleware('role:manager');
});
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    Route::post(RoutePath::for('logout', '/logout'), function () {
        $request =request();
        auth()->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return to_route('login');
    })   ->name('logout');
});
Route::get('/tpl_0', function () {
    return view('tpl_0');
});
