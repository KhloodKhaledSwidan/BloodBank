<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::get('governorates', 'MainController@governorates');
    Route::post('forgot-password', 'AuthController@forgot_password');
    Route::post('reset-password', 'AuthController@reset_password');
    Route::get('cities', 'MainController@cities');
    Route::get('settings', 'MainController@settings');
    Route::get('blood-types', 'MainController@blood_types');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('contacts', 'MainController@contacts');
        Route::get('categories', 'MainController@categories');
        Route::post('profile', 'AuthController@profile');
        Route::get('posts', 'PostsController@posts');
        Route::get('post', 'PostsController@post');

        Route::get('single-post/{id}', 'PostsController@singlePost');
        Route::get('my-favourite', 'PostsController@myFavourite');
        Route::get('favourite-Posts', 'PostsController@favouritePosts');
        Route::post('create-donation', 'DonationController@createDonationRequest');
        Route::get('donation-detail/{id}', 'DonationController@donation_details');
        Route::get('donation-requests', 'DonationController@donation_requests');
        Route::get('toggle-favourite', 'PostsController@toggle_favourite');
        Route::post('notifications-settings', 'NotificationsController@notificationSettings');
        Route::get('notification-list','NotificationsController@notificationList');
    });

});
