<?php

namespace App\Http\Controllers;

use Package\UseCases\Todo\Store\TodoStoreInputData;
use Package\UseCases\Todo\Store\TodoStoreInput;
use Package\UseCases\Todo\Show\TodoShowInput;
use Package\UseCases\Todo\Show\TodoShowInputData;
use Package\UseCases\Todo\Index\TodoIndexInput;
use Package\UseCases\Todo\Index\TodoIndexInputData;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneInput;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneInputData;

class TodoController extends Controller
{
    public function index(TodoIndexInput $interactor)
    {
        $request = new TodoIndexInputData();
        $interactor->handle($request);
    }

    public function show(TodoShowInput $interactor)
    {
        $request = new TodoShowInputData(request()->route("id"));
        $interactor->handle($request);
    }

    public function create()
    {
        return view("todo.create");
    }

    public function store(TodoStoreInput $interactor)
    {
        $request = new TodoStoreInputData(request()->input("text"));
        $interactor->handle($request);
    }

    public function toggleDone(TodoToggleDoneInput $interactor)
    {
        $request = new TodoToggleDoneInputData(request()->route("id"));
        $interactor->handle($request);
    }
}
