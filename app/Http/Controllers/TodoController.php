<?php

namespace App\Http\Controllers;

use Package\App\TodoIndex\TodoIndex;
use Package\App\TodoIndex\TodoIndexController;
use Package\App\TodoIndex\TodoIndexPresenter;
use Package\App\TodoOutputAsCsvFile\TodoOutputAsCsvFile;
use Package\App\TodoOutputAsCsvFile\TodoOutputAsCsvFileController;
use Package\App\TodoOutputAsCsvFile\TodoOutputAsCsvFilePresenter;
use Package\App\TodoShow\TodoShow;
use Package\App\TodoShow\TodoShowController;
use Package\App\TodoShow\TodoShowPresenter;
use Package\App\TodoStore\TodoStore;
use Package\App\TodoStore\TodoStoreController;
use Package\App\TodoStore\TodoStorePresenter;
use Package\App\TodoToggleDone\TodoToggleDone;
use Package\App\TodoToggleDone\TodoToggleDoneController;
use Package\App\TodoToggleDone\TodoToggleDonePresenter;

class TodoController extends Controller
{
    public function index(TodoIndexController $controller, TodoIndex $usecase, TodoIndexPresenter $presenter)
    {
        return $presenter->execute($usecase->execute($controller));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoStoreController $controller, TodoStore $usecase, TodoStorePresenter $presenter)
    {
        return $presenter->execute($usecase->execute($controller));
    }

    public function show(TodoShowController $controller, TodoShow $usecase, TodoShowPresenter $presenter)
    {
        return $presenter->execute($usecase->execute($controller));
    }

    public function toggleDone(TodoToggleDoneController $controller, TodoToggleDone $usecase, TodoToggleDonePresenter $presenter)
    {
        return $presenter->execute($usecase->execute($controller));
    }

    public function outputAsCSVFile(TodoOutputAsCsvFileController $controller, TodoOutputAsCsvFile $usecase, TodoOutputAsCsvFilePresenter $presenter)
    {
        return $presenter->execute($usecase->execute($controller));
    }
}
