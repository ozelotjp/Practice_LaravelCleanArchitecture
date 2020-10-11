<?php

namespace App\Http\Controllers;

use Package\Http\TodoCreate;
use Package\Http\TodoIndex;
use Package\Http\TodoOutputAsCSVFile;
use Package\Http\TodoShow;
use Package\Http\TodoStore;
use Package\Http\TodoToggleDone;

class TodoController extends Controller
{
    public function index(TodoIndex $todoIndex)
    {
        return $todoIndex->execute();
    }

    public function create(TodoCreate $todoCreate)
    {
        return $todoCreate->execute();
    }

    public function store(TodoStore $todoStore)
    {
        return $todoStore->execute();
    }

    public function show(TodoShow $todoShow)
    {
        return $todoShow->execute();
    }

    public function toggleDone(TodoToggleDone $todoToggleDone)
    {
        return $todoToggleDone->execute();
    }

    public function outputAsCSVFile(TodoOutputAsCSVFile $todoOutputAsCSVFile)
    {
        return $todoOutputAsCSVFile->execute();
    }
}
