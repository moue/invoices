<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
//Route::model('invoice', 'Invoice');
//Route::model('invoice_item', 'InvoiceItem');
Route::model('role', 'Role');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Invoice Management
    Route::resource('invoice', 'InvoicesController');

    # Advertiser Management
    Route::resource('advertiser', 'AdvertisersController');

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
    Route::controller('roles', 'AdminRolesController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');

});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::

# Contact Us Static Page
Route::get('contact-us', function()
{
    // Return about us page
    return View::make('site/contact-us');
});

# Subscribe Static Page


# Index Page - Last route, no matches
Route::get('/', array('before' => 'detectLang','uses' => 'UserController@getIndex'));

View::composer(['invoices.create', 'invoices.edit', 'invoices.show', 'invoices.index'], function($view)
{
    $user_options = User::select(DB::raw('concat (first_name," ",last_name) as full_name,id'))->lists('full_name', 'id');
    $advertiser_options = Advertiser::all()->lists('advertiser', 'id');
    $size_options = DB::table('invoice_items_sizes')->lists('size', 'id');

    $view->with('user_options', $user_options)
         ->with('advertiser_options', $advertiser_options)
         ->with('size_options', $size_options);
});

Route::get('/secret', function()
{
 
    $user = Auth::user();
 
    if ($user->hasRole('advertiser'))
    {
        return 'You are an advertiser!';
    }
    elseif ($user->hasRole('admin')) {
        return 'You are an admin';
    }
    return 'You have no roles!';
});

Route::get('/subscribe', function()
{
 
    return View::make('subscriptions/index');
});