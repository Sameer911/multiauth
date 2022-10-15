<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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

// Route::get('/', function () {
//     return view('login');
// });


// Test database connection
Route::get('/db', function () {
  try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
});

Route::get('/', 'Admin\AdminController@login');

Auth::routes();



Route::get('/logout', 'HomeController@logout');

Route::get('/dashboard', 'HomeController@adminhome')->name('admin.index')->middleware('is_admin');


Route::middleware(['auth', 'is_admin'])->group(function(){
    // Route::get('/dashboard', function(){
    //     return view('admin.index');

    // Route::get('dashboard', 'Admin\AdminController@index');

    
    Route::get('add-daily-data', 'Admin\AdminController@adddailydata');

    Route::get('allorders', 'Admin\AdminController@allorders');

    Route::get('editallorder/{id}', 'Admin\AdminController@editpage');

    Route::get('delete/{id}', 'Admin\AdminController@deletepaid');


    Route::get('order-paid', 'Admin\AdminController@paid');

    Route::post('insert-paid', 'Admin\AdminController@insertpaid');

    Route::get('edit-paidorder/{id}', 'Admin\AdminController@editpaid');

    
    Route::put('update-paid/{id}', 'Admin\AdminController@paidupdate');

    // Route::put('update-paid/{id}', 'Admin\AdminController@updatepaid');

    Route::get('cashinhand','CashInHandController@index');

    Route::post('debit-insert', 'CashInHandController@debitinsert');

    Route::get('debit-edit/{id}', 'CashInHandController@debitedit');

    Route::put('debit-update','CashInHandController@debitupdate');

    Route::get('delete-debit/{id}','CashInHandController@debitdelete');

    Route::get('save-to-paid/{id}', 'Admin\AdminController@savetopiad');

    Route::get('delete-daily/{id}', 'User\UserdataController@dailydelete');

});






Route::middleware(['auth'])->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('user-dash', 'User\UserdataController@index');
        
    Route::get('daily', 'User\UserdataController@daily');

    Route::get('orders', 'User\UserdataController@orders');

    Route::get('adddaily', 'User\UserdataController@adddaily');

    Route::post('data-insert', 'User\UserdataController@dataadd');

    Route::get('edit/{id}', 'User\UserdataController@edit');

    Route::put('data-update/{id}', 'User\UserdataController@update');

    // Route::get('delete/{id}', 'User\UserdataController@destroy');

    Route::get('paid-order', 'User\UserdataController@paidorderu');

    Route::get('delete-paid/{id}', 'Admin\AdminController@deletepaid');

    Route::get('save-paid/{id}', 'User\UserdataController@save_to_paid');

    Route::get('paid-data', 'User\UserdataController@datapaid');

    Route::get('delete-daily/{id}', 'User\UserdataController@dailydelete');



    

});









