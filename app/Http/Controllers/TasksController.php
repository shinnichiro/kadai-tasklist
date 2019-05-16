<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $tasks = Task::all();
        
        if (\Auth::check()){
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy("created_at", "desc")->paginate(10);
            
            $data = [
                "user" => $user,
                "tasks" => $tasks,
            ];
        } else {
            return redirect("welcome");
        }
        
        return view("tasks.index", $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view("tasks.create", [
            "task" => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "date" => "required|max:191",
            "content" => "required|max:191",
            "status" => "required|max:10",
        ]);
        
        $request->user()->tasks()->create([
            "date" => $request->date,
            "content" => $request->content,
            "status" => $request->status
        ]);
    
        return redirect("tasks");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        
        return view("tasks.show", [
            "task" => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            return view("tasks.edit", [
                "task" => $task,
            ]);
        } else {
            return redirect("welcome");
        }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "date" => "required|max:191",
            "content" => "required|max:191",
            "status" => "required|max:10",
        ]);        
        
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            $task->date = $request->date;
            $task->content = $request->content;
            $task->status = $request->status;
            $task->save();
            return redirect("tasks");
        } else {
            return redirect("welcome");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            $task->delete();
            return redirect("tasks");
        } else {
            return redirect("welcome");
        }
        

    }
}
