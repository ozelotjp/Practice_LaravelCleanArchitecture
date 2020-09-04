<?php

namespace Package\UseCases\Todo\ToggleDone;

interface TodoToggleDoneInput
{
    public function handle(TodoToggleDoneInputData $input);
}
