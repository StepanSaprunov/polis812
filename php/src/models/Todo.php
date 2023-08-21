<?php

class Todo
{
    public int $userId;
    public int $id;
    public string $title;
    public bool $completed;

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