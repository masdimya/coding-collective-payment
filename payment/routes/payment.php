<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/withdraw', 'TransactionController@withdrawBalance')->middleware('payment.auth');
Route::post('/deposit', 'TransactionController@depositBalance')->middleware('payment.auth');
