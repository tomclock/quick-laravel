<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\CtrlController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SaveController;
use App\Http\Middleware\LogMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});

//[/hello]に対するルート
//Route::get('hello','app/Http/Controllers/HelloController@index');

/*
Route::get('hello',function(){
    return 'Hello World!';
});
*/

Route::get('hello',[HelloController::class,'index']);

Route::get('hello/view',[HelloController::class,'view']);

Route::get('hello/view2',[HelloController::class,'view2']);

Route::get('hello/list',[HelloController::class,'list']);

Route::get('view/escape',[ViewController::class,'escape']);

Route::get('view/if',[ViewController::class,'if']);

Route::get('view/foreach_assoc',[ViewController::class,'foreach_assoc']);

Route::get('view/foreach_loop',[ViewController::class,'foreach_loop']);

Route::get('view/master',[ViewController::class,'master']);

Route::get('view/comp',[ViewController::class,'comp']);

Route::get('view/list',[ViewController::class,'list']);

Route::prefix('members')->group(function(){
    Route::get('info',[RouteController::class,'info']);
    Route::get('article',[RouteController::class,'article']);
});

Route::namespace('Main')->group(function(){
    Route::get('route/ns',[RouteController::class,'ns']);
});

Route::view('/route','route.view',['name'=>'Laravel']);

Route::redirect('/hoge','/',301);

// Route::resource('articles', 'ArticleController')
//     ->except(['edit','update']);

Route::get('hello/list',[HelloController::class,'list'])
    ->name('list');

Route::get('ctrl/form',[CtrlController::class,'form']);

Route::post('ctrl/result',[CtrlController::class,'result']);

Route::get('ctrl/upload',[CtrlController::class,'upload']);

Route::post('ctrl/uploadfile',[CtrlController::class,'uploadfile'])
    ->middleware(LogMiddleware::class);

Route::get('ctrl/middle',[CtrlController::class,'middle']);
//->middleware(LogMiddleware::class);

Route::get('state/recCookie', [StateController::class,'recCookie']);
Route::get('state/readCookie',  [StateController::class,'readCookie']);
Route::get('state/session1',  [StateController::class,'session1']);
Route::get('state/session2',  [StateController::class,'session2']);

Route::group(['middleware'=>['debug']], function()
{
    Route::get('ctrl/middle',[CtrlController::class,'middle']);
});

Route::get('record/find', [RecordController::class,'find']);
Route::get('record/where', [RecordController::class,'where']);
Route::get('record/hasmany', [RecordController::class,'hasmany']);

Route::get('save/create',  [SaveController::class,'create']);
Route::post('save/store', [SaveController::class,'store']);
Route::get('save/{id}/edit', [SaveController::class,'edit']);
Route::patch('save/{id}', [SaveController::class,'update']);
Route::get('save/{id}', [SaveController::class,'show']);
Route::delete('save/{id}', [SaveController::class,'destroy']);
/*
Route::fallback(function(){
    return view('route.error');
});
*/