<?php
/**
 * Countries Listing
 *
 * Simple CRUD interface for the `country` database table
 *
 * Created as a code challenge for Kinetic Supply
 *
 * @package Walcher
 * @subpackage Kinetic
 * @author Stephen Walcher <stephenwalcher@gmail.com>
 */

Route::get('/', function()
{
	return Redirect::to('countries');
});

Route::get('countries', 'CountryController@displayCountries');

Route::group(['prefix' => 'country'], function() {
    Route::get('add', 'CountryController@displayAdd');
    Route::post('add', 'CountryController@processAdd');

    Route::get('edit/{id}', 'CountryController@displayEdit');
    Route::post('edit/{id}', 'CountryController@processEdit');

    Route::get('delete/{id}', 'CountryController@processDelete');
});