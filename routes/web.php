<?php

use Illuminate\Support\Facades\Route;

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

// ========= HOMEPAGE ROUTE: START ========= //
require 'auth/auth.php';
// ========= HOMEPAGE ROUTE: END  ========= //


// ========= ADMIN ROUTE: START ========= //
require 'admin/homepage.php';
require 'admin/user.php';
// ========= ADMIN ROUTE: END  ========= //

// ========= USER ROUTE: START ========= //
require 'user/homepage.php';
// ========= USER ROUTE: END  ========= //
