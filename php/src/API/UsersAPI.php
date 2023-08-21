<?php

use GuzzleHttp\Client;

require_once('models/User.php');

class UsersAPI
{

    const UsersRoute = 'https://jsonplaceholder.typicode.com/users';

    /**
     * @return User[]|null
     *  */
    static function getUsers()
    {
        try {
            $client = new Client();
            $response = $client->get(UsersAPI::UsersRoute);
            $body = json_decode($response->getBody(), true);
            $users = array_map(function (array $user) {
                return new User($user);
            }, $body);
            return $users;
        } catch (\Throwable $th) {
            return null;
        }
        
    }


    /**
     * @return User|null
     */
    static function getUserById(int $id)
    {
        try {
            $client = new Client();
            $response = $client->get(UsersAPI::UsersRoute . "/${id}");
            $body = json_decode($response->getBody(), true);
            $user = new User($body);
            return $user;
        } catch (\Throwable $th) {
            return null;
        }

    }

}