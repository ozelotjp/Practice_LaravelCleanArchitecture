<?php

namespace Package\Domain\Model\Todo;

use Carbon\Carbon;

class TodoCreatedAt
{
    private Carbon $value;

    public function __construct(Carbon $value)
    {
        $this->value = $value;
    }

    public function value(): Carbon
    {
        return $this->value;
    }
}
