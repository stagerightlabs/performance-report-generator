<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/error', function ()  {
    return view('error');
});

$app->get('/donate', ['uses' => 'ReportController@donationForm', 'as' => 'donation.form']);
$app->post('/donate', ['uses' => 'ReportController@processDonation', 'as' => 'donation.handle']);
$app->get('/', ['uses' => 'ReportController@showReport', 'as' => 'show']);