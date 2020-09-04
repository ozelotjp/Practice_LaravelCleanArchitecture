<?php

namespace Package\UseCases\Todo\Index;

interface TodoIndexInput
{
    public function handle(TodoIndexInputData $input);
}
