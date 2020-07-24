<?php
use \App\User;
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

Route::get('/','CRUDAdminController@dashboard');
Route::resource('/homepage','HomePageController'); 
Route::get('/homeOpen/{id_home}&&{id_status}','HomePageController@homeOpen');
Route::get('/status/{id_status}','StatusController@index');
Route::get('/cari','HomePageController@cari');

// Route::get('/myAcc','MyAccountController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['web','auth']],function(){
	// Route::get('/', function () {
	//     return view('welcome');
	// });
	
	Route::get('/home',function(){
		if(Auth::user()->admin==0){
			return view('user.home');
		}
		else if(Auth::user()->admin==2){
			return view('user.home');
		}
		else{
			$users['users'] = User::all()->where('admin',0);
			// return redirect('/dashboard');
			 return view('admin.index',$users);
		}
	});	
	//Route::get('/homepage','HomePageController@index');
	Route::get('/homePanitia', function(){
		return view('panitia/homePanitia.info');
	});
	Route::get('/dashboard','CRUDAdminController@dashboard');
	Route::get('/highToLow={highToLow}','CRUDAdminController@orderByRating');
	Route::resource('/account','MyAccountController');
	Route::get('/verif/{id_user}','CRUDAdminController@verif');	
	Route::resource('/crud','CRUDAdminController');
	Route::get('verifTerima/{id_user}','CRUDAdminController@verifTerima');
	Route::get('verifTolak/{id_user}','CRUDAdminController@verifTolak');
	Route::post('/rate/{id_home}&&{id_user}','HomePageController@uploadRating');
	Route::post('/add_comment/{id_home}&&{id_user}','HomePageController@comment');
});