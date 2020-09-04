<?php

namespace Package\UseCases\Todo\Index;

interface TodoIndexOutput
{
    public function handle(TodoIndexOutputData $output);
}
