<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function index(){

        $tasks = Task::where('user_id' , Auth::user()->id )->orderBy('updated_at' , 'DESC')->get();

        return view('home' , compact('tasks'));
    }

    public function create(){


        return view('add_task');
    }

    public function store(TaskRequest $request){
            $task = new Task();
            $task->subject = $request->subject;
            $task->description = $request->description;
            $task->statue = '0';
            $task->user_id = Auth::user()->id;

            $task->save();

            return redirect()->route('home.index')->with(['success' => 'created task']);
    }

    public function edit($id){
        $task = Task::findOrFail($id);

        return view('edit_task' , compact('task'));
    }

    public function update($id ,Request  $request){
        $task = Task::findOrFail($id);

        $task->subject = $request->subject;
        $task->description = $request->description;
        $task->statue = $request->status;
        $task->user_id = Auth::user()->id;

        $task->update();


        return redirect()->route('home.index')->with(['update' => 'update task']);
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('home.index')->with(['delete' => 'successfully deleted']);
    }
}
