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

$router->get('/error', function () {
    return view('error');
});

$router->get('/donate', ['uses' => 'ReportController@donationForm', 'as' => 'donation.form']);
$router->post('/donate', ['uses' => 'ReportController@processDonation', 'as' => 'donation.handle']);
$router->get('/', ['uses' => 'ReportController@showReport', 'as' => 'show']);
