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

use App\Task;
use Illuminate\Http\Request;

/**
    * Show Task Dashboard
    */
Route::get('/tasks', function () {
    error_log("INFO: get /tasks");
    return view('tasks', [
        'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
});

Route::get('/', function () {
    error_log("INFO: get /");
    return view('welcome',[
        'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
});

/**
    * Add New Task
    */
Route::post('/task', function (Request $request) {
    error_log("INFO: post /task");
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        error_log("ERROR: Add task failed.");
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
    * Delete Task
    */
Route::delete('/task/{id}', function ($id) {
    error_log('INFO: delete /task/'.$id);
    Task::findOrFail($id)->delete();

    return redirect('/home');
});

Auth::routes();

Route::get('/home', function () {
    error_log("INFO: get /");
    return view('home', [
        'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
})->middleware('auth')->name('home');


Route::get('/arrival', function () {
    error_log("INFO: get /");
    return view('arrival', [
        'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
})->middleware('auth')->name('arrival');
/**
 * Toggle Task approval
 */
Route::post('/task/approved/{id}', function ($id) {
    error_log('INFO: post /task/'.$id);
    $task = Task::findOrFail($id);

    $task->approved = !$task->approved;
    $task->save();

    return redirect('/');
});

/**
 * Toggle Task arrival
 */

Route::post('/task/arrived/{id}', function ($id) {
    error_log('INFO: post /task/'.$id);
    $task = Task::findOrFail($id);

    $task->arrived = !$task->arrived;
    $task->save();

    return redirect('/');
});
