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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'ClientController@home' );
Route::get('/cart', 'ClientController@cart' );
Route::get('/shop', 'ClientController@shop' );
Route::get('/checkout', 'ClientController@checkout' );
Route::get('/login', 'ClientController@login' );
Route::get('/signup', 'ClientController@signup' );
Route::post('/createaccount', 'ClientController@createaccount' ); 
Route::post('/accsesaccount', 'ClientController@accsesaccount' );
Route::get('/logout', 'ClientController@logout' ); 


Route::get('/admin', 'AdminController@dashboard' );   
Route::get('/orders', 'AdminController@orders' );     

Route::get('/addcategory', 'CategoryController@addcategory' );  
Route::get('/categories', 'CategoryController@categories' );
Route::post('/savecategory', 'CategoryController@savecategory' );   //post --> save data in DB
Route::get('/edit_category/{id}', 'CategoryController@edit' );   //post --> save data in DB
Route::get('/delete/{id}', 'CategoryController@delete' );   //--> save data in DB
Route::post('/updatecategory', 'CategoryController@updatecategory' );   //post --> update data in DB




Route::get('/addproduct', 'ProductController@addproduct' );  
Route::get('/products', 'ProductController@products' ); 
Route::post('/saveproduct', 'ProductController@saveproduct' );   //save data with post  saveproduct  saveproduct
Route::get('/edit_product/{id}', 'ProductController@editeproduct' );   //post --> save data in DB
Route::post('/updateproduct', 'ProductController@updateproduct' );   //post --> update data in DB
Route::get('/delete_product/{id}', 'ProductController@delete_product' ); 
Route::get('/unactivate_product/{id}', 'ProductController@unactivate_product' ); 
Route::get('/activate_product/{id}', 'ProductController@activate_product' ); 



Route::get('/sliders', 'SliderController@sliders' );     
Route::get('/addslider', 'SliderController@addslider' );
Route::post('/saveslider', 'SliderController@saveslider' );
Route::get('/edit_slider/{id}', 'SliderController@edit_slider' );   //post --> save data in DB ////////////
Route::post('/updateslider', 'SliderController@updateslider' );   //post --> update data in DB
Route::get('/delete_slider/{id}', 'SliderController@delete_slider' ); 
Route::get('/unactivate_slider/{id}', 'SliderController@unactivate_slider' ); 
Route::get('/activate_slider/{id}', 'SliderController@activate_slider' ); 









