<?php

use GuzzleHttp\Client;

require('models/Post.php');

class PostsAPI
{
    const PostsRoute = 'https://jsonplaceholder.typicode.com/posts';

    /**
     * @return Post[]|null
     */
    static function getPosts() {
        try {
            $client = new Client();
            $response = $client->get(PostsAPI::PostsRoute);
            $body = json_decode($response->getBody(), true);
            $posts = array_map(function(array $post) {
                return new Post($post);
            }, $body);
            return $posts;
        } catch (\Throwable $th) {
            return null;
        }
    }


    /**
     * @return Post|null
     */
    static function getPostById(int $id) {
        try {
            $client = new Client();
            $response = $client->get(PostsAPI::PostsRoute . "/${id}");
            $body = json_decode($response->getBody(), true);
            $post = new Post($body);
            return $post;
        } catch (\Throwable $th) {
            return null;
        }
    }
}