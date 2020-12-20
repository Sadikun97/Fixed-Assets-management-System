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

Route::get('/', function () {
    return view('welcome');
});


//admin panel login backend
Route::get('/login','Backend\UserController@login')->name('login');
Route::post('/login','Backend\UserController@loginProcess')->name('login.do');



Route::group(['middleware'=>'auth'],function (){

Route::get('/dashboard','Backend\HomeController@dashboard')->name('dashboard');
Route::get('/home','Backend\HomeController@index');


//item
Route::get('/item','Backend\ItemController@makeitem')->name('item');
Route::post('/item/create','Backend\ItemController@createItem')->name('item.create');
Route::get('/item/edit/{id}','Backend\ItemController@edititem')->name('item.edit');
Route::put('/item/update/{id}','Backend\ItemController@updateitem')->name('item.update');
Route::get('/item/delete/{id}','Backend\ItemController@delete')->name('item.delete');
Route::get('/fview','Backend\ItemController@fview')->name('fview');

//item_types
Route::get('/item_types','Backend\Item_TypesController@makeitypes')->name('item_types');
Route::post('/item_types/create','Backend\Item_TypesController@createitypes')->name('itypes.create');
Route::get('/item_typesview','Backend\Item_TypesController@itemtypesview')->name('itview');
Route::get('/item_types/delete/{id}','Backend\Item_TypesController@delete')->name('it.delete');



//item distribution

Route::get('/item_distributions','Backend\Item_DistributionsController@makeitemd')->name('itemt.distributions');

Route::post('/item_distributions/create','Backend\Item_DistributionsController@createitemd')->name('itemd.create');
Route::get('/itemdview','Backend\Item_DistributionsController@itemtdview')->name('itemd.view');



//employee

Route::get('/employee','Backend\EmployeeController@employee')->name('employee');
Route::post('/employee/add','Backend\EmployeeController@addemployee')->name('add.employee');
Route::get('/eview','Backend\EmployeeController@eview')->name('eview');
Route::get('/employee/delete/{id}','Backend\EmployeeController@deleteemployee')->name('employee.delete');


//stock
Route::get('/stock','Backend\StockController@makestock')->name('stock');
Route::post('/stock/add','Backend\StockController@addstock')->name('add.stock');
Route::get('/stockview','Backend\StockController@stockview')->name('stock.view');

//purchases
Route::get('/purchases','Backend\purchasesController@makepurchases')->name('purchases');
Route::post('/purchases/create','backend\PurchasesController@createpurchases')->name('purchases.create');



});




 