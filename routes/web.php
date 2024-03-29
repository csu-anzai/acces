<?php

use App\Notifications\ProposalSent;
use App\User;
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

Route::get('/', 'HomeController@index');
Route::post('getDepartments','AjaxController@getDepartments');
Route::get('/test', function(){
	User::find(3)->notify(new ProposalSent(User::findOrFail(6)));
	event(new \App\Events\ForwardedProposal("Bryl Lim", 3));
	return "inserted!";
});


Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	
	Route::post('createProposal','AjaxController@createProposal');
	Route::post('submitProposal','AjaxController@submitProposal');
	Route::post('updateProcess','AjaxController@updateProcess');
	Route::post('getProposal','AjaxController@getProposal');
	Route::post('getProposalDataForReview','AjaxController@getProposalDataForReview');
	Route::post('getReviewCommittee','AjaxController@getReviewCommittee');
	Route::post('markAsRead','AjaxController@markAsRead');
	Route::post('assignReviewCommittee','AjaxController@assignReviewCommittee');
	Route::post('getHistory','AjaxController@getHistory');
	
	Route::get('form1', function () {
		return view('forms.form1');
	})->name('form1');

	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

