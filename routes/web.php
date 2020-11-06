<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

// Route::get('customers', 'customersController@index')->name('customers.index');
// Route::get('customers/create', 'customersController@create')->name('customers.create');
// Route::post('customers', 'customersController@store')->name('customers.store');
// Route::get('customers/{customer}', 'customersController@show')->middleware('can:view,customer');
// Route::get('customers/{customer}/edit', 'customersController@edit')->name('customers.edit');
// Route::patch('customers/{customer}', 'customersController@update')->name('customers.update');
// Route::delete('customers/{customer}', 'customersController@destroy')->name('customers.destroy');

//Route::resource('customers', 'CustomersController');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
  return view('layout');
});


Auth::routes(['register' => false]);
// Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('blocks', 'BlockController');

Route::resource('hostels', 'HostelController');

Route::post('rooms/fetch', 'RoomController@fetch')->name('rooms.fetch');
Route::resource('rooms', 'RoomController');

Route::resource('beds', 'BedController');

Route::resource('students', 'StudentController');

Route::resource('offreg', 'OffregController');

Route::get('acceptedRequest', 'StudentRequestController@accepted')->name('acceptedRequest.accepted');
Route::get('rejectedRequest', 'StudentRequestController@rejected')->name('rejectedRequest.rejected');
Route::post('accept','AcceptController@accept');
Route::post('reject','AcceptController@reject');

Route::resource('requests', 'StudentRequestController');

Route::resource('yearSetting', 'YearController');

Route::resource('allocations', 'AllocationsController');
Route::get('allocated', 'AllocationsController@allocated')->name('allocations.allocated');

Route::resource('annoucements', 'AnnoucementController');

Route::any('/search', 'SearchController@index');

Route::get('generate-pdf','PDFController@generatePDF')->name('generatePDF.print');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

// Route::prefix('student')->group(function() {
//   Route::get('/login','Auth\StudentLoginController@showLoginForm')->name('student.login');
//   Route::post('/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
//   Route::get('logout/', 'Auth\StudentLoginController@logout')->name('student.logout');
//   Route::get('/', 'Auth\StudentController@index')->name('student.dashboard');
//  }) ;





Route::group(['middleware' => ['auth']], function(){
        Route::group(['middleware' => ['user'], 'prefix' => 'user'], function(){
                
                Route::resource('customers', 'CustomersController');
                
                
  });
});


//  Route:: get('/admin', function(){

//     $role = Role:: create([
//         'name' => 'admin'
//     ]);

//     $permission = Permission:: create([
//         'name' => 'UpdateInfo'
//     ]);

//     Auth()->user()->assignRole('admin');
//     Auth()->user()->givePermissionTo('UpdateInfo');

//  });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
