<?php

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

Route::get('/', [\App\Http\Controllers\Home::class, 'index'])->name('home');
Route::get('/language/{code}', [\App\Http\Controllers\Home::class, 'language'])->name('language');

Route::get('/calculator', [\App\Http\Controllers\Information::class, 'calculator'])->name('information.calculator');
Route::get('/faq', [\App\Http\Controllers\Information::class, 'faq'])->name('information.faq');
Route::get('/contacts', [\App\Http\Controllers\Information::class, 'contacts'])->name('information.contacts');
Route::get('/for-business', [\App\Http\Controllers\Information::class, 'forBusiness'])->name('information.for-business');
Route::get('/for-consumers', [\App\Http\Controllers\Information::class, 'forConsumers'])->name('information.for-consumers');

Route::get('/blog', [\App\Http\Controllers\Blog::class, 'list'])->name('blog.list');
Route::get('/blog/{id}', [\App\Http\Controllers\Blog::class, 'post'])->name('blog.post');

Route::post('feedback', [\App\Http\Controllers\Home::class, 'feedback'])->name('request.feedback');
Route::post('callback', [\App\Http\Controllers\Home::class, 'callback'])->name('request.callback');


Route::prefix('/account')->middleware(['auth'])->group(function() {
    Route::get('/', [\App\Http\Controllers\Account::class, 'profile'])->name('account');

    Route::get('/orders', [\App\Http\Controllers\Account::class, 'orders'])->name('account.orders');
    Route::get('/orders/history', [\App\Http\Controllers\Account::class, 'ordersHistory'])->name('account.orders.history');
    Route::get('/payments', [\App\Http\Controllers\Account::class, 'payments'])->name('account.payments');

    Route::get('/orders/create', [\App\Http\Controllers\Account::class, 'ordersCreate'])->name('account.orders.create');
    Route::match(['post', 'get'], '/orders/create/storage-in-boxes', [\App\Http\Controllers\Account::class, 'ordersCreateStorageInBoxes'])->name('account.orders.create.storage-in-boxes');
    Route::match(['post', 'get'],'/orders/create/storage-on-pallets', [\App\Http\Controllers\Account::class, 'ordersCreateStorageOnPallets'])->name('account.orders.create.storage-on-pallets');
    Route::match(['post', 'get'],'/orders/create/rent-of-boxes', [\App\Http\Controllers\Account::class, 'ordersCreateRentOfBoxes'])->name('account.orders.create.rent-of-boxes');
    Route::match(['post', 'get'],'/orders/create/storage-in-volume', [\App\Http\Controllers\Account::class, 'ordersCreateStorageInVolume'])->name('account.orders.create.storage-in-volume');
    Route::match(['post', 'get'],'/orders/create/return', [\App\Http\Controllers\Account::class, 'ordersCreateReturn'])->name('account.orders.create.return');

    Route::post('/update/personal-information', [\App\Http\Controllers\Account::class, 'profileUpdatePersonalInformation'])->name('account.update.personal-information');
    Route::post('/update/address', [\App\Http\Controllers\Account::class, 'profileUpdateAddress'])->name('account.update.address');
    Route::post('/update/entrance', [\App\Http\Controllers\Account::class, 'profileUpdateEntrance'])->name('account.update.entrance');
    Route::post('/update/avatar', [\App\Http\Controllers\Account::class, 'profileUpdateAvatar'])->name('account.update.avatar');
});

Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('admin');

    Route::match(['get', 'post'], '/settings', [\App\Http\Controllers\Admin\Settings::class, 'index'])->name('admin.settings');
    Route::match(['get', 'post'], '/prices', [\App\Http\Controllers\Admin\Prices::class, 'index'])->name('admin.prices');

    Route::get('/task-manager', [\App\Http\Controllers\Admin\TaskManager::class, 'index'])->name('admin.task-manager');
    Route::post('/task-manager/create-or-update-task', [\App\Http\Controllers\Admin\TaskManager::class, 'createOrUpdateTask'])->name('admin.task-manager.create-or-update-task');
    Route::post('/task-manager/delete-task', [\App\Http\Controllers\Admin\TaskManager::class, 'deleteTask'])->name('admin.task-manager.delete-task');
    Route::post('/task-manager/get-calendar-tasks', [\App\Http\Controllers\Admin\TaskManager::class, 'getCalendarTasks'])->name('admin.task-manager.get-calendar-tasks');
    Route::post('/task-manager/get-task-info', [\App\Http\Controllers\Admin\TaskManager::class, 'getTaskInfo'])->name('admin.task-manager.get-task-info');

    Route::get('/pages/faq', [\App\Http\Controllers\Admin\Pages::class, 'faq'])->name('admin.pages.faq');
    Route::post('/pages/faq/update', [\App\Http\Controllers\Admin\Pages::class, 'faqUpdate'])->name('admin.pages.faq.update');
    Route::match(['get', 'post'], '/pages/home', [\App\Http\Controllers\Admin\Pages::class, 'home'])->name('admin.pages.home');
    Route::match(['get', 'post'], '/pages/testimonials', [\App\Http\Controllers\Admin\Pages::class, 'testimonials'])->name('admin.pages.testimonials');

    Route::get('/blog/list', [\App\Http\Controllers\Admin\Blog::class, 'list'])->name('admin.blog.list');
    Route::get('/blog/post/create', [\App\Http\Controllers\Admin\Blog::class, 'create'])->name('admin.blog.create');
    Route::post('/blog/post/create', [\App\Http\Controllers\Admin\Blog::class, 'createRequest'])->name('admin.blog.create.request');
    Route::get('/blog/post/edit/{id}', [\App\Http\Controllers\Admin\Blog::class, 'edit'])->name('admin.blog.edit');
    Route::post('/blog/post/edit/{id}', [\App\Http\Controllers\Admin\Blog::class, 'editRequest'])->name('admin.blog.edit.request');

    Route::get('/users', [\App\Http\Controllers\Admin\Users::class, 'list'])->name('admin.users.list');
    Route::get('/users/create', [\App\Http\Controllers\Admin\Users::class, 'create'])->name('admin.users.create');
    Route::post('/users/create', [\App\Http\Controllers\Admin\Users::class, 'createRequest'])->name('admin.users.create.request');
    Route::get('/users/edit/{id}', [\App\Http\Controllers\Admin\Users::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/edit/{id}', [\App\Http\Controllers\Admin\Users::class, 'editRequest'])->name('admin.users.edit.request');
    Route::get('/users/authorize/{id}', [\App\Http\Controllers\Admin\Users::class, 'authorizeAs'])->name('admin.users.authorize-as');

    Route::get('/services', [\App\Http\Controllers\Admin\Service::class, 'list'])->name('admin.services.list');
    Route::get('/services/edit/{id}', [\App\Http\Controllers\Admin\Service::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/edit/{id}', [\App\Http\Controllers\Admin\Service::class, 'editRequest'])->name('admin.services.edit.request');

    Route::get('/order/products', [\App\Http\Controllers\Admin\Order::class, 'productList'])->name('admin.order.products.list');
    Route::get('/order/products/edit/{id}', [\App\Http\Controllers\Admin\Order::class, 'productEdit'])->name('admin.order.products.edit');
    Route::post('/order/products/edit/{id}', [\App\Http\Controllers\Admin\Order::class, 'productEditRequest'])->name('admin.order.products.edit.request');
    Route::get('/order/products/create', [\App\Http\Controllers\Admin\Order::class, 'productCreate'])->name('admin.order.products.create');
    Route::post('/order/products/create', [\App\Http\Controllers\Admin\Order::class, 'productCreateRequest'])->name('admin.order.products.create.request');


    Route::get('/sales', [\App\Http\Controllers\Admin\Sales::class, 'index'])->name('admin.sales.list');
    Route::get('/sales/export', [\App\Http\Controllers\Admin\Sales::class, 'export'])->name('admin.sales.export.xls');

    Route::get('/virtual-boxes', [\App\Http\Controllers\Admin\VirtualBox::class, 'list'])->name('admin.virtual-box.list');
    Route::get('/virtual-boxes/create', [\App\Http\Controllers\Admin\VirtualBox::class, 'create'])->name('admin.virtual-box.create');
    Route::post('/virtual-boxes/create', [\App\Http\Controllers\Admin\VirtualBox::class, 'createRequest'])->name('admin.virtual-box.create.request');
    Route::get('/virtual-boxes/edit/{id}', [\App\Http\Controllers\Admin\VirtualBox::class, 'edit'])->name('admin.virtual-box.edit');
    Route::get('/virtual-boxes/delete/{id}', [\App\Http\Controllers\Admin\VirtualBox::class, 'delete'])->name('admin.virtual-box.delete');
    Route::post('/virtual-boxes/edit/{id}', [\App\Http\Controllers\Admin\VirtualBox::class, 'edit'])->name('admin.virtual-box.edit.request');

    Route::post('/invoices/create', [\App\Http\Controllers\Admin\Invoice::class, 'create'])->name('admin.invoice.create');
    Route::post('/invoices/status', [\App\Http\Controllers\Admin\Invoice::class, 'status'])->name('admin.invoice.status');
    Route::post('/invoices/edit', [\App\Http\Controllers\Admin\Invoice::class, 'edit'])->name('admin.invoice.edit');
    Route::post('/invoices/delete', [\App\Http\Controllers\Admin\Invoice::class, 'delete'])->name('admin.invoice.delete');

    Route::post('/upload/image', [\App\Http\Controllers\Admin\Upload::class, 'image'])->name('admin.upload.image');

    Route::post('/callbacks/{id}/note', [\App\Http\Controllers\Admin\Callbacks::class, 'note'])->name('admin.callbacks.note');
    Route::resource('/callbacks', \App\Http\Controllers\Admin\Callbacks::class, ['as' => 'admin', 'except' => 'show']);

    Route::resource('/orders', \App\Http\Controllers\Admin\Orders::class, ['as' => 'admin', 'except' => 'show']);

    Route::resource('/branches', \App\Http\Controllers\Admin\Branches::class, ['as' => 'admin', 'except' => 'show']);
    Route::resource('/web-pages', \App\Http\Controllers\Admin\WebPages::class, ['as' => 'admin', 'except' => 'show']);
});

require __DIR__.'/auth.php';

// Оставить последним, чтобы не перезаписало верхние роуты.
Route::get('/{web_page}', [\App\Http\Controllers\WebPage::class, 'index'])->name('webpage');
