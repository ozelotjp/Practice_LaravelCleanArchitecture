<?php

namespace Package\UseCases\Todo\Show;

interface TodoShowOutput
{
    public function handle(TodoShowOutputData $output);
}
