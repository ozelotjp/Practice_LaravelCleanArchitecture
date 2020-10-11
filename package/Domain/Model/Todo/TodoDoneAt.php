<?php

namespace Package\Domain\Model\Todo;

use Carbon\Carbon;

class TodoDoneAt
{
    private ?Carbon $value;

    /**
     * @param Carbon|string|null $value
     */
    public function __construct($value)
    {
        if ($value instanceof Carbon) {
            $this->value = $value;

            return;
        }

        if (is_string($value)) {
            $this->value = Carbon::make($value);

            return;
        }

        if ($value === null) {
            $this->value = null;

            return;
        }

        throw new \InvalidArgumentException();
    }

    public function value(): ?Carbon
    {
        return $this->value;
    }
}
