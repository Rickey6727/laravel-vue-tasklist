<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    $tasks = \App\Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::get('/task/get',function(){
    $tasks = \App\Task::orderBy('created_at', 'asc')->get();
	return $tasks;	
});

Route::post('/task/add', function (Request $request) {
    $task = new \App\Task;
    $task->name = request('name');
    $task->save();
    return redirect('/');
});

Route::post('/task/edit/{task}', function (Request $request) {
    $task = \App\Task::find($request->id);
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});
   
Route::delete('/task/delete/{task}', function (\App\Task $task) {
    $task->delete();
    return redirect('/');
});
  