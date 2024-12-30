<?php

use App\Http\Controllers\ModifyTransferRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveDollarRequestController;
use App\Http\Controllers\SendMoneyOutOfBaghdadRequestController;
use App\Http\Controllers\SendMoneyToIraqController;
use App\Models\ModifyTransferRequest;
use App\Models\ReserveDollarRequest;
use App\Models\SendMoneyOutOfBaghdadRequest;
use App\Models\SendMoneyToIraq;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/reserve-dollars', function () {
    return view('reserve-dollar');
})->name('reserve-dollar');

Route::get('/modify-transfer', function () {
    return view('modify-transfer');
})->name('modify-transfer');

Route::get('/calculate-fees', function () {
    return view('calculate-fees');
})->name('calculate-fees');

Route::get('/send-money', function () {
    return view('send-money');
})->name('send-money');

Route::get('/send-money-foreign', function () {
    return view('send-money-foreign');
})->name('send-money-foreign');

Route::get('/send-money-iraq', function () {
    return view('send-money-to-iraq');
})->name('send-money-iraq');

Route::get('/sell-digital-currency', function () {
    return view('sell-digital-currency');
})->name('sell-digital-currency');


Route::resource('send-money-out', SendMoneyOutOfBaghdadRequestController::class)->only(['store']);
Route::resource('send-money-to-iraq', SendMoneyToIraqController::class)->only(['store']);
Route::resource('reserve-dollar-request', ReserveDollarRequestController::class)->only(['store']);
Route::resource('modify-transfer-request', ModifyTransferRequestController::class)->only(['store']);


Route::middleware(['auth'])
    ->group(function () {
        Route::resource('send-money-out', SendMoneyOutOfBaghdadRequestController::class)->only(['index', 'destroy', 'show']);
        Route::resource('send-money-to-iraq', controller: SendMoneyToIraqController::class)->only(['index', 'destroy', 'show']);
        Route::resource('reserve-dollar-request', ReserveDollarRequestController::class)->only(['index', 'destroy', 'show']);
        Route::resource('modify-transfer-request', ModifyTransferRequestController::class)->only(['index', 'destroy', 'show']);
    });

Route::get('/dashboard', function () {
    $toIraqCount = SendMoneyToIraq::count();
    $outOfIraqCount = SendMoneyOutOfBaghdadRequest::count();
    $reseveDollarCount = ReserveDollarRequest::count();
    $modifyRequests = ModifyTransferRequest::count();
    return view('dashboard', compact('toIraqCount', 'outOfIraqCount', 'reseveDollarCount', 'modifyRequests'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('switch-theme', function () {
    $theme = request()->session()->get('theme', 'light');

    // Toggle between 'light' and 'dark' themes
    $newTheme = ($theme === 'light') ? 'dark' : 'light';

    // Store the new theme in the session
    request()->session()->put('theme', $newTheme);

    return redirect()->back();
})->name('switch.theme');

require __DIR__.'/auth.php';