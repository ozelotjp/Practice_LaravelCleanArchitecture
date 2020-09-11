<?php

namespace Package\Domain\Todo;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class TodoDoneAt
{
    private $value;

    /**
     * TodoDoneAt constructor.
     *
     * @param Carbon|string|null $value
     */
    public function __construct($value)
    {
        if ($value instanceof Carbon === false && is_string($value) === false && is_null($value) === false) {
            throw new \InvalidArgumentException();
        }
        if (is_string($value)) {
            try {
                $value = Carbon::make($value);
            } catch (InvalidFormatException $exception) {
                throw new \InvalidArgumentException($exception->getMessage(), $exception->getCode());
            }
        }
        $this->value = $value;
    }

    public function value(): ?Carbon
    {
        return $this->value;
    }
}
