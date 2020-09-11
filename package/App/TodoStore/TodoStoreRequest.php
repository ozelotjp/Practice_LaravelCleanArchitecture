<?php

namespace Package\App\TodoStore;

use Package\Domain\Todo\TodoText;

interface TodoStoreRequest
{
    public function text(): TodoText;
}
