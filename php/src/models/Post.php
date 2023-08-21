<?php

class Post
{
    public int $userId;
    public int $id;
    public string $title;
    public string $body;

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