<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Api\PersonalController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Api\ClientProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum', 'checkBlock'])->group(function () {
    Route::get('/user', [ApiAuthController::class, 'authUser']);
    Route::get('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/orders', [PersonalController::class, 'orders']);
    Route::post('/changeInfor', [PersonalController::class, 'changeInfor']);
    Route::post('/changePass', [PersonalController::class, 'changePass']);

    // client cart routes
    Route::post('/add-to-cart', [CartController::class, 'store']);
    Route::get('/get_cart', [CartController::class, 'getCart']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/delete_product_in_cart', [CartController::class, 'deleteProductIncart']);
    Route::post('/update_qty_cart', [CartController::class, 'updateQty']);
    Route::post('/clearCart', [CartController::class, 'clearCart']);

    //check out
    Route::post('/checkout', [OrderController::class, 'storeOrder']);
    Route::post('/order/canceled/{order}', [OrderController::class, 'cancelOrder']);

    // Manager routes
    //Account Controller
    Route::get('/adminAccs', [AccountController::class, 'adminAccounts'])->middleware(['role:admin']);
    Route::get('/clientAccs', [AccountController::class, 'clientAccounts'])->middleware(['role:admin']);
    Route::get('/employeeAccs', [AccountController::class, 'employeeAccounts'])->middleware(['role:admin']);
    Route::get('/admin/user', [AccountController::class, 'getUSer'])->middleware(['role:admin']);
    // admin change account infor
    Route::post('/admin/changeInfor', [AccountController::class, 'changeInfor'])->middleware(['role:admin,employee']);
    // get details user
    Route::get('/admin/user/{id}', [AccountController::class, 'getUser'])->middleware(['role:admin']);
    //delete user
    Route::delete('/user_delete/{user}', [AccountController::class, 'deleteUser'])->middleware(['role:admin']);
    Route::post('/block_user/{user}', [AccountController::class, 'blockUser'])->middleware(['role:admin']);
    Route::post('/unblock_user/{user}', [AccountController::class, 'unBlockUser'])->middleware(['role:admin']);

    //orders Routes
    Route::get('/admin/orders', [AdminOrderController::class, 'getOrders'])->middleware(['role:admin,employee']);
    Route::get('/admin/order/{id}', [AdminOrderController::class, 'show'])->middleware(['role:admin,employee']);
    Route::post('/admin/order/process/{order}', [AdminOrderController::class, 'markProcess'])->middleware(['role:admin,employee']);
    Route::post('/admin/order/delivered/{order}', [AdminOrderController::class, 'markDelivered'])->middleware(['role:admin,employee']);
    Route::post('/admin/order/canceled/{order}', [AdminOrderController::class, 'markCanceled'])->middleware(['role:admin,employee']);
    Route::post('/admin/order/refunded/{order}', [AdminOrderController::class, 'markRefunded'])->middleware(['role:admin,employee']);
    Route::delete('/admin/order/{order}', [AdminOrderController::class, 'destroy'])->middleware(['role:admin']);

    // admin products routes
    Route::get('/admin/products', [ProductsController::class, 'getProducts'])->middleware(['role:admin,employee']);
    Route::get('/admin/product/{id}', [ProductsController::class, 'show'])->middleware(['role:admin,employee']);
    Route::delete('/admin/product/{product}', [ProductsController::class, 'destroy'])->middleware(['role:admin']);
    Route::post('/admin/updateQty/product/{product}', [ProductsController::class, 'newQuantity'])->middleware(['role:admin,employee']);

    //category routes
    Route::get('/admin/category', [CategoryController::class, 'getCategories'])->middleware(['role:admin']);


    //supplier routes
    Route::get('/admin/supplier', [SupplierController::class, 'getSuppliers'])->middleware(['role:admin']);

    Route::get('/admin/post', [PostController::class, 'getPosts'])->middleware(['role:admin,employee']);

});
Route::post('/uploads', [UploadController::class, 'uploads']);
Route::post('/login', [ApiAuthController::class, 'login'])->name('ApiLogin');
Route::post('/register', [ApiAuthController::class, 'register'])->name('ApiRegister');

// Home routes
Route::get('/latestProducts', [HomeController::class, 'latestProducts']);
Route::get('/bestSellers', [HomeController::class, 'bestSeller']);
Route::get('/brandLogos', [HomeController::class, 'brandLogos']);

// Products in client
Route::get('/products', [ClientProductController::class, 'index']);
Route::get('/getCategories', [ClientProductController::class, 'CategoriesInProductsPage']);
Route::get('/getBrands', [ClientProductController::class, 'BrandsInProductsPage']);
// client product search route
Route::get('/search', [ClientProductController::class, 'search']);
//Product detail
Route::get('/product/{id}', [ClientProductController::class, 'show']);

// upload images
Route::post('/uploads', [UploadController::class, 'uploads']);
