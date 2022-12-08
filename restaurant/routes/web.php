<?php
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController ;
use App\Http\Controllers\Frontend\RegisterController ;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index']);

route::get('/accsess',[FrontendCategoryController::class,'index'])->name('categories.index');
route::get('/categories{category}',[FrontendCategoryController::class,'show'])->name('categories.show');
route::get('/menus',[FrontendMenuController::class,'index'])->name('menus.index');
route::get('/reservation/step-one',[FrontendReservationController::class,'stepOne'])->name('reservations.step.one');
route::post('/reservation/step-one',[FrontendReservationController::class,'storeStepOne'])->name('reservations.store.step.one');
route::get('/reservation/step-two',[FrontendReservationController::class,'stepTwo'])->name('reservations.step.two');
route::post('/reservation/step-two',[FrontendReservationController::class,'storeStepTwo'])->name('reservations.store.step.two');
route::get('thankyou',[WelcomeController::class,'thankyou'])->name('thankyou');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth','admin'])->name('Admin.')->prefix('admin')->group(function(){
Route::get('/',[Admincontroller::class,'index'])->name('index');
Route::resource('/menus',MenuController::class);
Route::resource('/reservations',ReservationController::class);
Route::resource('/tables',TableController::class);
Route::resource('categories',CategoryController::class);
});
Route::get('cart', [FrontendMenuController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [FrontendMenuController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FrontendMenuController::class, 'update'])->name('update.cart');
Route::get('remove-from-cart/{id}', [FrontendMenuController::class, 'remove'])->name('remove.from.cart');

Route::get('payment/page', [PaymentController::class, 'index']);
Route::post('payment/pay', [PaymentController::class, 'make_payment'])->name('pay');
Route::get('payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('user/register', [RegisterController::class, 'register']);
Route::post('user/register', [RegisterController::class, 'store'])->name('user.register');


// Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
// Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
// Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
// Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

require __DIR__.'/auth.php';
