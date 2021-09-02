<?php

use App\Http\Controllers\API\UserContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\PrintController;
use Illuminate\Http\Request;

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

// DASHBOARD
Route::resource('dashboard', DashboardController::class)->middleware(['auth']);


// Route::resource('/dasboard-login', UserContoller::class)->middleware(['auth'])->name('dashboard-register');


//product
Route::get('/add-product', function () {
    return view('Admin.add_product');
})->middleware(['auth'])->name('add.product');

Route::post('/insert-product',[ProductController::class,'store'])->middleware(['auth']);

Route::get('/all-product',[ProductController::class,'allProduct'])->middleware(['auth'])->name('all.product');

Route::get('/available-products',[ProductController::class,'availableProducts'])->middleware(['auth'])->name('available.products');

Route::get('/purchase-products/{id}', [ProductController::class,'purchaseData'])->middleware(['auth']);

Route::post('/insert-purchase-products',[ProductController::class,'storePurchase'])->middleware(['auth']);

Route::get('/product/{id}/edit',[ProductController::class,'edit'])->middleware(['auth'])->name('edit.product');

Route::put('/product/{id}',[ProductController::class,'update'])->middleware(['auth'])->name('update.product');

Route::delete('/product/{id}',[ProductController::class,'destroy'])->middleware(['auth'])->name('delete.product');



//invoice
Route::get('/add-invoice/{id}', [InvoiceController::class,'formData'])->middleware(['auth']);

Route::get('/new-invoice', [InvoiceController::class,'newformData'])->middleware(['auth'])->name('new.invoice');

Route::post('/insert-invoice',[InvoiceController::class,'store'])->middleware(['auth'])->name('insert.invoice');

Route::get('/invoice-details', function () {
    return view('Admin.invoice_details');
})->middleware(['auth'])->name('invoice.details');

Route::get('/all-invoice', [InvoiceController::class,'allInvoices'])->middleware(['auth'])->name('all.invoices');

Route::get('/sold-products',[InvoiceController::class,'soldProducts'])->middleware(['auth'])->name('sold.products');
// Route::get('/delete', [InvoiceController::class,'delete']);

Route::get('/create-invoice', [InvoiceController::class,'newInvoice'])->middleware(['auth'])->name('create.invoice');

// Route::post('/print-pdf', [InvoiceController::class,'storePrint'])->middleware(['auth'])->name('print.invoice');
Route::get('/print-invoice-by-date',[InvoiceController::class,'printInvoiceByDate'])->middleware(['auth'])->name('printInvoiceByDate.invoice');

Route::get('/print-stock-by-date',[InvoiceController::class,'printStockByDate'])->middleware(['auth'])->name('printStockByDate.invoice');

Route::get('/invoice-by-date/{startDate}/{endDate}',[InvoiceController::class,'invoiceByDate'])->middleware(['auth'])->name('invoiceByDate.invoice');

Route::get('/stock-by-date/{startDate}/{endDate}',[InvoiceController::class,'stockByDate'])->middleware(['auth'])->name('stockByDate.invoice');

Route::get('/invoice-by-date',[InvoiceController::class,'invoiceBydateasboard'])->middleware(['auth'])->name('invoiceBydateasboard.invoice');



//order
Route::get('/add-order/{name}', [ProductController::class,'formData'])->middleware(['auth'])->name('add.order');

Route::post('/insert-order',[OrderController::class,'store'])->middleware(['auth']);

Route::get('/all-orders',[OrderController::class,'ordersData'])->middleware(['auth'])->name('all.orders');

Route::get('/pending-orders',[OrderController::class,'pendingOrders'])->middleware(['auth'])->name('pending.orders');

Route::get('/delivered-orders',[OrderController::class,'deliveredOrders'])->middleware(['auth'])->name('delivereds.orders');

Route::get('/invoice',[OrderController::class,'deliveredOrders'])->middleware(['auth'])->name('delivered.orders');

Route::get('/new-order', [OrderController::class,'newformData'])->middleware(['auth'])->name('new.order');

Route::post('/insert-new-order',[OrderController::class,'newStore'])->middleware(['auth']);




// INCOME
Route::get('/all-income',[IncomeController::class,'allIncome'])->middleware(['auth'])->name('all.income');


// MANAGE USERS
Route::get('/all-users',[ManageUserController::class,'allUsers'])->middleware(['auth'])->name('all.users');

Route::get('/new-users', [ManageUserController::class,'addUsers'])->middleware(['auth'])->name('new.users');

Route::post('/addnew-users', [ManageUserController::class,'store'])->middleware(['auth'])->name('addnew.users');

Route::get('/users/{id}/edit', [ManageUserController::class,'editUsers'])->middleware(['auth'])->name('edit.users');

Route::put('/users/{id}',[ManageUserController::class,'update'])->middleware(['auth'])->name('update.users');

Route::delete('/users/{id}',[ManageUserController::class,'destroy'])->middleware(['auth'])->name('delete.users');
// Route::get('/dasboard',[ManageUserController::class,'allUsersDasboard'])->middleware(['auth'])->name('all.allUsersDasboard');

//customer
Route::get('/add-customer', function () {
    return view('Admin.add_customer');
})->middleware(['auth'])->name('add.customer');

Route::post('/insert-customer',[CustomerController::class,'store'])->middleware(['auth']);

Route::get('/all-customers',[CustomerController::class,'customersData'])->middleware(['auth'])->name('all.customers');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/customers/{id}/edit',[CustomerController::class,'edit'])->middleware(['auth'])->name('edit.customers');
Route::put('/customers/{id}',[CustomerController::class,'update'])->middleware(['auth'])->name('update.customers');
Route::delete('/customers/{id}',[CustomerController::class,'destroy'])->middleware(['auth'])->name('delete.customers');


require __DIR__.'/auth.php';


// PRINT 
Route::get('/getProduct/{name}', [App\Http\Controllers\InvoiceController::class, 'getProduct'])->name('getProduct');
Route::post('/Jumlah_Barang', [App\Http\Controllers\InvoiceController::class, 'JumlahBarang'])->name('JumlahBarang');
Route::resource('/print-invoice', PrintController::class)->middleware(['auth']);

