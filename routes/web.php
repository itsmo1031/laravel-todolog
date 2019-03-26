<?php

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
    //return view('welcome');
    return "Hello World!";
});

Route::get('/task/view', function() {
    $task = ['name' => 'Task 1', 'due_date' => '2019-03-26 12:00:11'];
 
    return view('task.view')->with('task', $task);
});

Route::get('/task/alert', function() {
    $task= ['name' => '라라벨 예제 작성', 
            'due_date' => '2019-03-26 11:22:33', 
            'comment' => '<script>alert("Welcome");</script>'];
    
    return view('task.alert')->with('task', $task);
});

Route::get('/calc/{num}', function($num) {
    return view('calc')->with('num', $num);
});

Route::get('task/list2', function() {
    $tasks= [
        ['name' => 'Response 클래스 분석', 'due_date' => '2015-06-01 11:22:33'],
        ['name' => '블레이드 예제 작성', 'due_date' => '2015-06-03 15:21:13'],
    ]; 
    return view('task.list2')->with('tasks', $tasks);
});

Route::get('task/list3', 'TaskController@list3');

Route::get('task/param/{id?}/{arg?}', 'TaskController@param');

Route::post('task/add', ['as' => 'task.add', 'uses' => 'TaskController@add']);

Route::group(['prefix' => 'task', 'as' => 'task.'], function(){
    Route::get('add', ['as' => 'add', 'uses' => 'TaskController@add']);
    Route::get('show/{id}', ['as' => 'show', 'uses' => 'TaskController@show']);
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('orders', 'OrderController');
});