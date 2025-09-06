<?php 

use App\Http\Controllers\Admin\HomepageController;

  Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['admin']], function () {
    Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
  });