<?php

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

Route::get('/gettransaction','TrasactionController@index' );
Route::get('/customerlist','CustomerController@list' );
Route::post('/save','CustomerController@save' );
Route::get('/getplace','PlaceController@getPlace' );
Route::get('/customer/register',function (){
    return view('customer.register');
});

Route::get('/testplace',function (){
    //echo App\Customer::all();
    $places= App\Place::all();
return View::make('place.place')->with('places',$places);

});

Route::get('/testcustomer',function (){
    $customers= App\Customer::all();

    /*$places= App\Place::all();*/
    /*return View::make('customer.customer')->with('customers',$customers);*/
    return view('customer.customer')->with('customers',$customers);

});

Route::get('/test',function (){
    $customers= App\models\Transaction::myFunc();

    dd($customers);

});


Route::get('/place',function (){
    return view('place.index');

});

Route::get('/serversideplace','PlaceController@serversideplace' );

Route::get('/registerplace',function (){
    return view('place.register');
});
Route::post('/saveplace','PlaceController@save' );
Route::post('/editplace','PlaceController@Edit');
Route::get('/editplace1/{id}','PlaceController@Edit1');
Route::post('/editsess','PlaceController@Editsess');
Route::get('/editsessfield','PlaceController@EditsessField');


Route::get('select2-autocomplete', 'Select2AutocompleteController@layout');
Route::get('select2-autocomplete-ajax', 'Select2AutocompleteController@dataAjax');
Route::get('select2-groupdata', 'Select2AutocompleteController@groupData');

/*Customer Routs*/

Route::get('/serversideCustomer','CustomerController@serversidecustomer' );
Route::get('/customer',function (){
    return view('customer.index');

});

Route::post('/customer/assignid','CustomerController@AssignId');
Route::get('/customer/edit','CustomerController@Edit');
Route::post('/customer/update','CustomerController@Update' );
Route::post('/customer/delete','CustomerController@Delete' );


