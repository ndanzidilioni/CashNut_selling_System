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
    return view('homepage');
});

Auth::routes();

//home router
Route::get('/home', 'HomeController@index')->name('home');

//route to page that enter bank details of peasant
Route::get('bankDetails1', function(){
    return view('inc.bankInfo');
    
});

//route to page that enter bank details of Buyer
Route::get('bankDetails2', function(){
    return view('inc.buyerInfo');
    
});



// route to the page that change the password of the user
// Route::get('changepaswd', function(){
//     return view('inc.changepaswd');
// });

Route::get('clerkadd', function(){
    return view('inc.clerk.addInfo');
});



Route::resource('smsview', 'ChatController@viewsms');



Route::resource('buyer', 'BuyerController');

Route::resource('clerk', 'ClerkController');

Route::resource('peasant', 'PeasantsController');

Route::resource('officer', 'OfficerController');

Route::resource('admin', 'AdminController');

Route::resource('bank', 'BankController');

Route::resource('bank2', 'BuyerInfoController');

Route::resource('chat', 'ChatController');

// Route::resource('manageUser1', 'ManageUserController
// ');
// Route::get('manageUser/{id}', 'ManageUserController@show');


$router->get('/show/{secsw}',[
    'uses' => 'ManageUserController@show',
    'as'   => 'manage'
]);

$router->get('/viewsms/{secsw}',[
    'uses' => 'ChatController@viewsms',
    'as'   => 'switch'
]);

$router->get('/destroy/{secsw}',[
    'uses' => 'ChatController@destroy',
    'as'   => 'deletesms'
]);

$router->get('/showInfo/{secsw}/{id}/{kilo}',[
    'uses' => 'BuyerController@showInfo',
    'as'   => 'showInfo'
]);

$router->get('/confirm/{id}/{peasant_id}',[
    'uses' => 'OfficerController@confirm',
    'as'   => 'confirmation'
]);


$router->get('/dowloads/{id}',[
    'uses' => 'BuyerController@dowloads',
    'as'   => 'dowload'
]);







Route::get('peasantDetails', 'OfficerController@peasantInformation');

Route::get('adminPeasant', 'AdminController@viewPeasant');
Route::get('adminBuyer', 'AdminController@viewBuyer');
Route::get('adminClerks', 'AdminController@viewClerk');
Route::get('adminOfficer', 'AdminController@viewOfficer');
Route::get('adminAdmin', 'AdminController@viewAdmin');

Route::get('viewslip', 'BuyerController@viewslip');

Route::get('addcost', 'AdminController@addpage');












