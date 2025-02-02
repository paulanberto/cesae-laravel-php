<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){

        $tasks = $this->allTasksFromDB();
        return view('tasks.all_tasks', compact('tasks'));
    }

    public function deleteTaskFromDB($id){

        db::table('tasks')->where('id', $id)->delete();
        return back();

    }

    public function viewTask($id){

        $task = db::table('tasks')
        ->join('users', 'tasks.user_id', 'users.id')
        ->where('tasks.id', $id)
        ->select('tasks.*', 'users.name as username')
        ->first();


        return view('tasks.view_tasks', compact('task'));
    }

    public function addTasks(){
        $allUsers =DB::table('users')->select('id', 'name as user_name')->get();
        return view('tasks.add_tasks', compact('allUsers'));
    }

    public function createTasks(Request $request){
       
        $request->validate([
            'name' => 'required|string|min:3',
            'description' =>'required|string|min:3',
            'user_id' =>'required'
        ]);

        Task::insert(
            [   
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => $request->user_id,

        ]);

        return redirect()->route('tasks')->with('message', 'Tarefa adicionada com sucesso');

    }

    private function allTasksFromDB(){

        $tasks = DB::table('tasks')
        ->join('users', 'tasks.user_id','=' ,'users.id')
        ->select('tasks.*', 'users.name as username')
        ->get();

        return $tasks;

    }
}