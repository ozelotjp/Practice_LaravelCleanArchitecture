<?php

namespace Package\App\TodoToggleDone;

use Package\Domain\Todo\TodoId;

interface TodoToggleDoneRequest
{
    public function id(): TodoId;
}
