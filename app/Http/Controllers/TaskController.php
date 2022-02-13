<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\PaginationSetting;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request; 

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortCollumn = $request->sortCollumn; 
        $sortOrder = $request->sortOrder; 
        $taskStatus = $request->taskStatus;
        $taskStatuses = TaskStatus::all();

        $tem_task = Task::all();
        $task_collumns = array_keys($tem_task->first()->getAttributes());
        $select_array =  $task_collumns;

        $page_limit = $request->page_limit;
        $paginationSettings = PaginationSetting::where('visible', '=', 1)->get();

        

        if (empty($sortCollumn) || empty($sortOrder) || empty($taskStatus)) {
            $tasks = Task::paginate($page_limit);
        } else {

            if($sortCollumn == "category_id") {
                $sortBool = true;
                
                if($sortOrder == "asc"){
                    $sortBool = false;
                }

                $tasks = Task::get()->sortBy(function($query){
                    return $query->getTaskStatus->title;
                }, SORT_REGULAR, $sortBool )->all();
            
            } 
            if (($taskStatus == 'all') || (empty($taskStatus))) {
                if ($page_limit == 1) { $tasks = Task::orderBy($sortCollumn, $sortOrder)->get(); }
                    else {
                        $tasks = Task::orderBy($sortCollumn, $sortOrder)->paginate($page_limit);
                    } 
             } else {
                if ($page_limit == 1) { 
                    $tasks = Task::where('status_id', '=' , $taskStatus)->orderBy($sortCollumn, $sortOrder)->get(); 
                }
               
            
                else {
                $tasks = Task::where('status_id', '=' , $taskStatus)->orderBy($sortCollumn, $sortOrder)->paginate($page_limit);
            } 
    }
}
    return view('task.index',['tasks' => $tasks, 'sortCollumn'=>$sortCollumn, 'sortOrder'=> $sortOrder,'select_array'=>$select_array, 'paginationSettings'=>$paginationSettings,'paginateSetting'=>$page_limit, 'taskStatus'=> $taskStatus, 'taskStatuses'=> $taskStatuses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
