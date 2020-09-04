<?php

namespace Package\Presenters\ViewModel;

class TodoViewModel
{
    public $id;
    public $text;
    public $done_at;
    public $created_at;
    public $updated_at;

    public function __construct(string $id, string $text, ?\DateTime $done_at, \DateTime $created_at, \DateTime $updated_at)
    {
        $this->id = $id;
        $this->text = $text;
        $this->done_at = $done_at;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
