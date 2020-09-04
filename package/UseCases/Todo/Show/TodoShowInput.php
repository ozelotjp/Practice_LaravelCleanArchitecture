<?php

namespace Package\UseCases\Todo\Show;

interface TodoShowInput
{
    public function handle(TodoShowInputData $input);
}
