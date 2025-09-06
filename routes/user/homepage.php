<?php 

use App\Http\Controllers\User\HomepageController;

  Route::group(['as'=>'user.','prefix'=>'user','middleware'=>['user']], function () {
    Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
  });