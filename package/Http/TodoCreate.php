<?php

namespace Package\Http;

use Illuminate\Http\Request;

class TodoCreate
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        return view('todo.create');
    }
}
