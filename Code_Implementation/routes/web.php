<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DesignerController;
use App\Http\Controllers\Admin\FashionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\DesignerAuthController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\FashionController as CustomerFashionController;
use App\Http\Controllers\Designer\DiscountController;
use App\Http\Controllers\Designer\FashionController as DesignerFashionController;
use App\Http\Controllers\Designer\HomeController as DesignerHomeController;
use App\Http\Controllers\Designer\OrderController;
use App\Http\Controllers\Designer\ReportController as DesignerReportController;
use App\Http\Controllers\Designer\ReviewController as DesignerReviewController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\ProfileController;

    Route::get('/admin/login', [AdminLoginController::class, 'getForm'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'postForm'])->name('admin.login.post');

    Route::get('/designer/login', [DesignerAuthController::class, 'getLoginForm'])->name('designer.login');
    Route::post('/designer/login', [DesignerAuthController::class, 'postLoginForm'])->name('designer.login.post');

    Route::get('/designer/register', [DesignerAuthController::class, 'getRegisterForm'])->name('designer.register');
    Route::post('/designer/register', [DesignerAuthController::class, 'postRegisterForm'])->name('designer.register.post');

    Route::get('/customer/login', [CustomerAuthController::class, 'getLoginForm'])->name('customer.login');
    Route::post('/customer/login', [CustomerAuthController::class, 'postLoginForm'])->name('customer.login.post');

    Route::get('/customer/register', [CustomerAuthController::class, 'getRegisterForm'])->name('customer.register');
    Route::post('/customer/register', [CustomerAuthController::class, 'postRegisterForm'])->name('customer.register.post');


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:web']], function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::resource('admins', AdminController::class);
        Route::resource('designers', DesignerController::class)->only('index', 'show', 'destroy');
        Route::get('designers/{designer}/get-status', [DesignerController::class, 'updateStatus'])->name('designers.updateStatus');
        Route::resource('customers', CustomerController::class)->only('index', 'show', 'destroy');
        Route::resource('categories', CategoryController::class);
        Route::resource('fashions', FashionController::class)->only('index', 'show', 'destroy');
        Route::resource('reviews', ReviewController::class)->only('index', 'show', 'destroy');

        Route::get('/reports/fashion', [ReportController::class, 'fashions'])->name('reports.fashion');
        Route::get('/reports/customer', [ReportController::class, 'customer'])->name('reports.customer');

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/', [HomeController::class, 'index'])->name('main');

    });

    Route::group(['prefix' => 'designer', 'as' => 'designer.', 'middleware' => ['auth:designers']], function () {
        Route::post('/logout', [DesignerAuthController::class, 'logout'])->name('logout');

        Route::get('/profile', [DesignerHomeController::class, 'getProfile'])->name('profile');
        Route::put('/profile', [DesignerHomeController::class, 'postProfile'])->name('profile.post');

        Route::resource('fashions', DesignerFashionController::class);
        Route::resource('discounts', DiscountController::class);
        Route::resource('reviews', DesignerReviewController::class)->only('index', 'show');
        Route::patch('orders/status', [OrderController::class, 'updateStatus'])->name('orders.update.status');

        Route::resource('orders', OrderController::class)->only('index', 'show');


        Route::get('/reports/fashion', [DesignerReportController::class, 'fashions'])->name('reports.fashion');
        Route::get('/reports/customer', [DesignerReportController::class, 'customer'])->name('reports.customer');

        Route::get('/home', [DesignerHomeController::class, 'index'])->name('home');
        Route::get('/', [DesignerHomeController::class, 'index'])->name('main');

    });


    Route::group(['as' => 'customer.', 'middleware' => []], function () {
        Route::group(['prefix' => 'customer', 'middleware' => ['auth:customers']], function () {
            Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');

            Route::get('/checkout', [CustomerOrderController::class, 'index'])->name('checkout.index');
            Route::post('/checkout', [CustomerOrderController::class, 'order'])->name('checkout.order');

            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('/profile', [ProfileController::class, 'postProfile'])->name('profile.update');

            Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
            Route::get('/profile/orders/{order}', [ProfileController::class, 'order'])->name('profile.order');
            Route::get('/profile/orders/{order}/review', [ProfileController::class, 'review'])->name('profile.review');
            Route::post('/profile/orders/{order}/review', [ProfileController::class, 'doReview'])->name('profile.review.post');

        });

        Route::get('/', [CustomerHomeController::class, 'index'])->name('home');
        Route::get('/contact', [CustomerHomeController::class, 'contact'])->name('contact');
        Route::get('/designers', [CustomerFashionController::class, 'designers'])->name('designers');
        Route::get('/fashions', [CustomerFashionController::class, 'index'])->name('fashions');
        Route::get('/fashions/{fashion}', [CustomerFashionController::class, 'fashion'])->name('fashion');
        Route::get('/designers/{designer}', [CustomerFashionController::class, 'designer'])->name('designer');

        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::get('/cart-add', [CartController::class, 'store'])->name('cart.store');
        Route::post('/cart-update', [CartController::class, 'update'])->name('cart.update');
        Route::get('/cart-destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    });
