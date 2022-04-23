<?php

use Illuminate\Support\Facades\Route;
use App\Models\Log;
use App\Models\Profile;
use Illuminate\Http\Request;
// 6行目
use App\Http\Controllers\LogController; //追加
use App\Http\Controllers\ProfileController; //追加
use App\Http\Controllers\CommentController; 

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
// 投稿のダッシュボード表示(Logs.blade.php)
Route::get('/', [LogController::class, 'create']);

// 「記録」の詳細画面表示
Route::get('/Logdetail/{Log}',[LogController::class, 'show']);
//詳細画面のcomment追加
Route::post('/Logdetails', [CommentController::class, 'store']);

// 投稿のダッシュボード表示(Logslist.blade.php)
Route::get('/Logslist1',[LogController::class, 'index1']);

Route::get('/Logslist2',[LogController::class, 'index2']);
    
Route::group(['middleware' => 'auth'], function(){

    // 新「投稿」を追加
    Route::post('/Logs', [LogController::class, 'store']);
    
    // 「本」の更新画面表示
    Route::get('/Logsedit/{Log}',[LogController::class, 'edit']);
    
    // 「本」の更新処理
    Route::post('Logs/update',[LogController::class, 'update']);
    
    // 本を削除
    Route::delete('/Log/{Log}',[LogController::class, 'destroy']);
    
	// ログインユーザの本を取得
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
});

// profileのダッシュボード表示
Route::get('/Profile', [ProfileController::class, 'index']);

// 新「profile」を追加
Route::post('/Profiles', [ProfileController::class, 'store']);

// //「本」の更新画面表示
// Route::get('/Profilesedit/{Profile}',[ProfileController::class, 'edit']);

// //「本」の更新処理
// Route::post('Profiles/update',[ProfileController::class, 'update']);

// // 本を削除
// Route::delete('/Profile/{Profile}', [ProfileController::class, 'destroy']);

// Route::get('/Comment', [CommentController::class, 'index']);

// 新「profile」を追加
Route::post('/Comments', [CommentController::class, 'store']);



Auth::routes();
