<?php

use GuzzleHttp\Client;

require('models/Post.php');

class PostsAPI
{
    const PostsRoute = 'https://jsonplaceholder.typicode.com/posts';

    /**
     * @return Post[]|null
     */
    static function getPosts()
    {
        try {
            $client = new Client();
            $response = $client->get(PostsAPI::PostsRoute);
            $body = json_decode($response->getBody(), true);
            $posts = array_map(function (array $post) {
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
    static function getPostById(int $id)
    {
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

    /**
     * @return Post[]|null
     */
    static function getPostsByUserId(int $id)
    {
        try {
            $client = new Client();
            $response = $client->get(UsersAPI::UsersRoute . "/${id}/posts");
            $body = json_decode($response->getBody(), true);
            $posts = array_map(function (array $post) {
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
    static function createPost(Post $post)
    {
        try {
            $client = new Client();
            $body = $post->toDto();
            unset($body['id']);
            $response = $client->post(PostsAPI::PostsRoute, [
                'body' => json_encode($body),
                'headers'  => [
                    'Content-Type' => 'application/json; charset=UTF-8'
                ]
            ]);
            $newPost = new Post(json_decode($response->getBody(), true));
            return $newPost;
        } catch (\Throwable $th) {
            return null;
        }
    }

    static function updatePost(Post $post) 
    {
        try {
            $client = new Client();
            $body = $post->toDto();
            $response = $client->put(PostsAPI::PostsRoute . "/{$post->id}", [
                'body' => json_encode($body),
                'headers'  => [
                    'Content-Type' => 'application/json; charset=UTF-8'
                ]
            ]);
            $updatedPost = new Post(json_decode($response->getBody(), true));
            return $updatedPost;
        } catch (\Throwable $th) {
            return null;
        }
    }


    /**
     * @return bool
     */
    static function deletePost(int $id)
    {
        try {
            $client = new Client();
            $response = $client->delete(PostsAPI::PostsRoute . "/{$id}");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}