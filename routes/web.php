<?php
 use App\product;
 use App\category;
 use App\Http\Middleware\isadmin;
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




Route::resource('user', 'UserController')->only(['index','destroy']);    

// Route::group(['middleware' => ['auth','isAdmin']], function () {
    
// });


Route::resource('/category', 'CategoryController')->except('show');

Route::resource('/product', 'productcontroller')->except('show');

Route::resource('/tag', 'tagcontroller')->except('show');
Route::post('/user','UserController@findUser');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
