<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellerPublications;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\ReputationController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\DataDeletionController;

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

//Principal page
Route::get('/', HomeController::class)->name('home');

//Registry and login
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/{provider}/auth/redirect', [AuthController::class, 'redirect'])->name('provider.auth.redirect');
Route::get('/{provider}/auth/callback', [AuthController::class, 'callback'])->name('provider.auth.callback');

//Personal space and user profile
Route::prefix('presonal/{user:username}')->middleware(['auth'])->group(function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personal');
    Route::patch('/', [PersonalController::class, 'update'])->name('personal.update');

    //Directions
    Route::get('/directions', [DirectionController::class, 'index'])->name('directions.index');
    Route::get('/directions/create', [DirectionController::class, 'create'])->name('directions.create');
    Route::post('/directions', [DirectionController::class, 'store'])->name('directions.store');
    Route::get('/directions/{direction}/edit', [DirectionController::class, 'edit'])->name('directions.edit');
    Route::patch('/directions/{direction}', [DirectionController::class, 'update'])->name('directions.update');
    Route::delete('/directions/{direction}', [DirectionController::class, 'destroy'])->name('directions.destroy');

    //Publications
    Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
    Route::get('/publications/create', [PublicationController::class, 'create'])->name('publications.create');
    Route::post('/publications', [PublicationController::class, 'store'])->name('publications.store');
    Route::get('/publications/{publication}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
    Route::patch('/publications/{publication}', [PublicationController::class, 'update'])->name('publications.update');
    Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])->name('publications.destroy');

    //Images
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');

    //Purchased products
    Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping.index');

    //Selled products
    Route::get('/selled', [SellController::class, 'index'])->name('selled.index');
    Route::post('seled/status/{status}', [SellController::class, 'changeStatus'])->name('selled.status');

    //Reputation
    Route::get('/reputation', [ReputationController::class, 'index'])->name('reputation.index');
});

//Seller publications customer view
Route::get('/publications/{user:username}/{publication:user_id}', SellerPublications::class)->name('seller.publications');

//Customer search
Route::get('/searchs/{searchType}/{data}', [SearchController::class, 'index'])->name('searchs.index');
Route::get('/searchs/{publication}', [SearchController::class, 'show'])->name('searchs.show');

//Shopping cart
route::get('/cart', [CartController::class, 'index'])->name('cart.index');
route::get('/cart/verify', [CartController::class, 'NEQ'])->name('cart.quantity.verify');
route::delete('/cart/deleteItem/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

//Payment section
route::post('/payment/paypal', [PaymentController::class, 'paypal'])->name('paypal');
route::get('/payment/paypal/success', [PaymentController::class, 'success'])->name('success');
route::get('/payment/paypal/cancel', [PaymentController::class, 'cancel'])->name('cancel');
route::get('/payment/addressConfirmation', [PaymentController::class, 'addressConfirmation' ])->name('payment.addressSelection');
route::get('/payment/confirmation', [PaymentController::class, 'confirmation'])->name('payment.confirmation');
route::get('/payment/{direction}', [PaymentController::class, 'index'])->name('payment.index');
route::post('payment/{paymentType}', [PaymentController::class, 'store'])->name('payment.store');


//Legal section
Route::get('/legal/privacypolicy', PrivacyController::class)->name('privacyPolicy');
Route::get('/legal/datadeletion', DataDeletionController::class)->name('dataDeletionFacebook');