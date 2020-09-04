<?php

namespace Package\Entities\Model\Todo;

use Carbon\Carbon;

class TodoCreatedAt
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value !== null ? Carbon::make($value) : null;
    }

    public function getValue()
    {
        return $this->value;
    }
}
