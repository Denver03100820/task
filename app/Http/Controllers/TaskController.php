<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $task = Task::where('task_user_id', $id)->get();
        $data['task'] = $task;
        
        
        return view('pages.task.index',$data);
    }
    
    public function trash()
    {
        $id = Auth::user()->id;
        $task = Task::where('task_user_id', $id)->onlyTrashed()->get();
        $data['task'] = $task;

        return view('pages.task.trash',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['action'] = 'save_task';
        $data['formDesc'] = 'Add';

        return view('pages.task.forms',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        #Get Default in status table
        $status = Status::where('status_code', 'TD')->first();

        $task = $this->validate($request, [
            'task_code' => 'required',
            'task_description' => 'required',
        ]);

        $task['id'] = Str::uuid();
        $task['task_status_id'] = $status->id;
        $task['task_user_id'] = Auth::user()->id;

        Task::create($task);

        return redirect('/task')->with('success', 'Task Successfully Created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task,$id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task,$id)
    {
        $data['action'] = 'update_task/'.$id;
        $data['formDesc'] = 'Edit';
        $data['task'] = $task->find($id);
        $data['status'] = Status::all();

        return view('pages.task.forms',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task,$id)
    {
        $updateData = $this->validate($request, [
            'task_code' => 'required',
            'task_status_id' => 'required',
            'task_description' => 'required',
        ]);

        // dd($updateData);

        $taskData = $task->find($id);
        $taskData->update($updateData);

        return redirect('/task')->with('success', 'Task Successfully Updated!');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task,$id)
    {
        $taskData = $task->find($id);
        $taskData->delete();

        return redirect('/task')->with('error', 'Task Successfully Deleted!');
    }
}
