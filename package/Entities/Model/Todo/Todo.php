<?php

namespace Package\Entities\Model\Todo;

use Package\Entities\Model\Todo\TodoCreatedAt;
use Package\Entities\Model\Todo\TodoDoneAt;
use Package\Entities\Model\Todo\TodoId;
use Package\Entities\Model\Todo\TodoText;
use Package\Entities\Model\Todo\TodoUpdatedAt;

class Todo
{
    private $id;
    private $text;
    private $done_at;
    private $created_at;
    private $updated_at;

    public function __construct(TodoId $id, TodoText $text, TodoDoneAt $done_at, TodoCreatedAt $created_at, TodoUpdatedAt $updated_at)
    {
        $this->id = $id;
        $this->text = $text;
        $this->done_at = $done_at;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId(): TodoId
    {
        return $this->id;
    }

    public function getText(): TodoText
    {
        return $this->text;
    }

    public function getDoneAt(): TodoDoneAt
    {
        return $this->done_at;
    }

    public function getCreatedAt(): TodoCreatedAt
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): TodoUpdatedAt
    {
        return $this->updated_at;
    }
}
