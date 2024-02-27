<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UsersController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product_page', [HomeController::class, 'productPage'])->name('product_page');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/bill', [BillController::class, 'addToBillAndCart'])->name('addBill');
Route::post('/bill_cancle/{id}', [BillController::class, 'cancleBill'])->name('cancleBill');
Route::get('/bill_delete/{id}', [BillController::class, 'deleteBill'])->name('deleteBill');
Route::get('/bill_list', [BillController::class, 'getBill'])->name('bill_list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart_delete', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');
Route::post('/confirm_cart', [CartController::class, 'confirmCart'])->name('confirm_cart');
Route::post('/create_payment', [PaymentController::class, 'create_payment'])->name('create_payment');

Route::get('/productDetail/{id}', [ProductController::class, 'getProductById'])->name('product_detail');

// Products
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.list');

    Route::get('/add', [ProductController::class, 'addProduct'])->name('products.add');
    Route::post('/add', [ProductController::class, 'handleAddProduct'])->name('handleAddProduct');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('products.edit');
    Route::post('/edit/{id}', [ProductController::class, 'handleEditProduct'])->name('products.handleEdit');
    Route::get('/{id}', [ProductController::class, 'handleDeleteProduct'])->name('products.handleDelete');
});
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.list');

    Route::get('/add', [CategoryController::class, 'addCategory'])->name('categories.add');
    Route::post('/add', [CategoryController::class, 'handleAddCategory'])->name('handleAddCategory');
    Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');
    Route::post('/edit/{id}', [CategoryController::class, 'handleEditCategory'])->name('categories.handleEdit');
    Route::get('/{id}', [CategoryController::class, 'handleDeleteCategory'])->name('categories.handleDelete');
});
Route::get('dang_ki', [AuthController::class, 'showDangKi']);
Route::post('dang_ki', [AuthController::class, 'dang_ki'])->name('dang_ki');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('dang_nhap');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/products', [ProductController::class, 'listProduct'])->name('products.list');
    Route::get('/products/deleted', [ProductController::class, 'listProductDeleted'])->name('products.deleted');
    Route::get('/products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    Route::get('/products/add', [ProductController::class, 'addProduct'])->name('products.add');
    Route::post('/products/add', [ProductController::class, 'handleAddProduct'])->name('handleAddProduct');
    Route::get('/products/edit/{id}', [ProductController::class, 'editProduct'])->name('products.edit');
    Route::post('/products/edit/{id}', [ProductController::class, 'handleEditProduct'])->name('products.handleEdit');
    Route::get('/products/{id}', [ProductController::class, 'handleDeleteProduct'])->name('products.handleDelete');
    Route::get('/products/remove/{id}', [ProductController::class, 'handleRemoveProduct'])->name('products.hardDelete');

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.categories.list');
    Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('admin.categories.add');
    Route::post('/category/add', [CategoryController::class, 'handleAddCategory'])->name('admin.handleAddCategory');
    Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.categories.edit');
    Route::post('/category/edit/{id}', [CategoryController::class, 'handleEditCategory'])->name('admin.categories.handleEdit');

    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/users/add', [UsersController::class, 'addUser'])->name('users.add');
    Route::post('/users/add', [UsersController::class, 'handleAddUser'])->name('handleAddUser');
    Route::get('/users/edit/{id}', [UsersController::class, 'editUser'])->name('users.edit');
    Route::post('/users/edit/{id}', [UsersController::class, 'handleEditUser'])->name('users.handleEdit');

    Route::get('/order', [BillController::class, 'getAllBill'])->name('order.list');
    Route::get('/order_edit/{id}', [BillController::class, 'editBill'])->name('order.edit');
    Route::post('/order_edit/{id}', [BillController::class, 'handleEditBill'])->name('order.handleEdit');
    Route::get('/order_delete/{id}', [BillController::class, 'getAllBill'])->name('order.delete');
});
