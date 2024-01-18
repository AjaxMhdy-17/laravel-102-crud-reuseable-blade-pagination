<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/tasks', function () {

    //getting all data from Task Table
    // $tasks = \App\Models\Task::all() ; 
    //getting all data and sorting as base on latest 
    $tasks = Task::latest()->paginate(5);

    //to get deeper in database check laravel database query builder 


    return view('tasks', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');


Route::view('/task/create', '/layouts/create')->name('tasks.create');


Route::get('/task/{id}', function ($id) {
    // importing Task model and finding data with $id
    // $task = \App\Models\Task::find($id);

    //here we query data with $id. if not found then show 404 page
    $task = Task::findOrFail($id);

    return view('single', ['task' => $task]);
})->name('tasks.show');


Route::get('/task/edit/{id}', function ($id) {
    // importing Task model and finding data with $id
    // $task = \App\Models\Task::find($id);
    //here we query data with $id. if not found then show 404 page

    $task = Task::findOrFail($id);

    return view('/layouts/edit', ['task' => $task]);
})->name('tasks.edit');


Route::post('/tasks', function (Request $request) {
    // senitizing our $request
    $data = $request->validate([
        'title' => 'required|max:225',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    // if there is something wrong then it will return error message 
    // and will stop execute here 


    //taking new instance of Task Model
    $task = new Task;
    //assigning data 
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    //saving data
    $task->save();
    //   here we will added session data using with method 
    //we creating session variable with("success","value") and setting the value 
    ///this is like one time session it's called flush messages
    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', "Task Created Successfully");
})->name('tasks.store');



Route::put('/task/{id}', function ($id , Request $request) {

    $data = $request->validate([
        'title' => 'required|max:225',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save() ; 


    return redirect()->route("tasks.show",['id'=> $task->id])->with('sucess',"Task Updated Successfully");


})->name('task.update');



Route::delete('/task/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success',"Task Deleted Successfully");
})->name('task.destroy');


Route::fallback(function () {
    return "This is 404 page";
});
