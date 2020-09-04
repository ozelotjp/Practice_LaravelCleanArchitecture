<?php

namespace Package\UseCases\Todo\Store;

class TodoStoreInputData
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
}
