<?php

namespace Package\UseCases\Todo\ToggleDone;

interface TodoToggleDoneOutput
{
    public function handle(TodoToggleDoneOutputData $output);
}
