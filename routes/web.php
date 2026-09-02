<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\OrderController;


// Route::get('/', function () {
//     return view('user.index');
// });
Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('blogs', [BlogController::class, 'Userindex'])->name('user.blog');
Route::get('blogs/{id}', [BlogController::class, 'Usershow'])->name('user.show');


Route::get('/contact', function () {
    return view ('user.contact');
})->name('user.contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/product-view', function () {
    return view ('user.products.show');
})->name('user');
Route::get('/privacy-policy', function () {
    return view('user.privacy');
})->name('user.privacy');
// Route::get('/recipt', function () {
//     return view ('user.recipt');
// })->name('user.recipt');

Route::get('/about', function () {
    return view ('user.about');
})->name('user.about');

Route::resource('product', UserCartController::class);
Route::resource('product', UserCartController::class)
    ->parameters([
        'product' => 'slug'
    ]);
Route::get('/receipt/{order}', [UserCartController::class, 'showReceipt'])->name('user.recipt');
Route::get('/track-order', [CartController::class, 'track'])->name('order.track');
    



Route::get('/product/{id}', [CartController::class, 'show'])->name('product.show');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
Route::post('/coupon/apply',[CouponController::class,'apply'])->name('coupon.apply');

use App\Http\Controllers\CheckoutController;


    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order-success/{id}', function ($id) {
    $order = App\Models\Order::findOrFail($id);
    return view('user.cart.success', compact('order'));
})->name('orders.success');



Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.index');
    //     })->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
        
        Route::resource('products', ProductController::class);
        Route::resource('carts', CartController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('setting', UserProfileController::class);
        Route::resource('blog', BlogController::class);
        Route::get('/receipt', [CartController::class, 'showReceipt'])->name('admin.recipt');
        
        Route::resource('coupons', CouponController::class);
         Route::get('/messages', [ContactController::class, 'adminIndex'])
        ->name('admin.messages');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
});


require __DIR__.'/auth.php';




