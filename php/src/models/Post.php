<?php

class Post
{
    public $userId;
    public $id;
    public $title;
    public $body;

    function __construct(array $post)
    {
        [
            'userId' => $this->userId,
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body
        ] = $post;
    }

    public function toDto()
    {
        return [
            'userId' => $this->userId,
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body
        ];
    }
}