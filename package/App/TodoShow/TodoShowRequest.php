<?php

namespace Package\App\TodoShow;

use Package\Domain\Todo\TodoId;

interface TodoShowRequest
{
    public function id(): TodoId;
}
