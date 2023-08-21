<?php

use GuzzleHttp\Client;

require('models/Todo.php');

class TodosAPI
{
    const TodosRoute = 'https://jsonplaceholder.typicode.com/posts';

    /**
     * @return Todo[]|null
     */
    static function getPosts() {
        try {
            $client = new Client();
            $response = $client->get(TodosAPI::TodosRoute);
            $body = json_decode($response->getBody(), true);
            $todos = array_map(function(array $todo) {
                return new Todo($todo);
            }, $body);
            return $todos;
        } catch (\Throwable $th) {
            return null;
        }
    }


    /**
     * @return Todo|null
     */
    static function getPostById(int $id) {
        try {
            $client = new Client();
            $response = $client->get(TodosAPI::TodosRoute . "/${id}");
            $body = json_decode($response->getBody(), true);
            $todo = new Todo($body);
            return $todo;
        } catch (\Throwable $th) {
            return null;
        }
    }
}