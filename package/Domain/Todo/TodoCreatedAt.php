<?php

namespace Package\Domain\Todo;

use Carbon\Carbon;

class TodoCreatedAt
{
    private $value;

    public function __construct(?Carbon $value)
    {
        $this->value = $value;
    }

    public function value(): ?Carbon
    {
        return $this->value;
    }
}
