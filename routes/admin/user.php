<?php 

use App\Http\Controllers\Admin\UserController;

  Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['admin']], function () {    
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/datatables', [UserController::class, 'dataTables'])->name('user.datatables');
    Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{id}/get', [UserController::class, 'get_user'])->name('user.get');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
  });
  