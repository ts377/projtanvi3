<?php

namespace App\Http\Controllers;

use App\Task;
use App\Repositories\TaskInterface;
use App\Services\TaskServices;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // space that we can use the repository from
    protected $model;
    protected $repo;


    public function __construct(TaskServices $services, TaskInterface $taskRepo)
    {
        // set the model
        $this->model = $services;
        $this->repo=$taskRepo;
    }



    public function store(Request $request)
    {
        $response=$this->model->create($request);
        return $response;
    }



    public function update(Request $request,Task $task1 )
    {

        $response=$this->model->create($request,$task1);
        return $response;


    }



}