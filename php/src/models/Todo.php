<?php

class Todo
{
    public $userId;
    public $id;
    public $title;
    public $completed;

    function __construct(array $post)
    {
        [
            'userId' => $this->userId,
            'id' => $this->id,
            'title' => $this->title,
            'completed' => $this->completed
        ] = $post;
    }

    public function toDto()
    {
        return [
            'userId' => $this->userId,
            'id' => $this->id,
            'title' => $this->title,
            'completed' => $this->completed
        ];
    }
}