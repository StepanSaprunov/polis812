<?php
require_once '../vendor/autoload.php';

require_once('API/UsersAPI.php');
require_once('API/PostsAPI.php');
require_once('API/TodosAPI.php');

$allUsers = UsersAPI::getUsers();
$singleUser = UsersAPI::getUserById(1);

$allTasks = TodosAPI::getTodos();
$singleTask = TodosAPI::getTodoById(1);
$userTasks = TodosAPI::getTodosByUserId(1);

$allPosts = PostsAPI::getPosts();
$singlePost = PostsAPI::getPostById(1);
$userPosts = PostsAPI::getPostsByUserId(1);

$createdPost = PostsAPI::createPost(
    new Post(
        [
            'userId' => 1,
            'title' => 'Hire me',
            'body' => 'Pls'
        ]
    )
);

$postToUpdate = new Post($singlePost->toDto());
$postToUpdate->body = 'I would like to work in your company!';
$updatedPost = PostsAPI::updatePost($postToUpdate);

$deletedPost = PostsAPI::deletePost(1);

echo '<pre>';
print_r([
    "allUsers" => $allUsers,
    "singleUser" => $singleUser,
    "allTasks" => $allTasks,
    "singleTask" => $singleTask,
    "userTasks" => $userTasks,
    "allPosts" => $allPosts,
    "singlePost" => $singlePost,
    "userPosts" => $userPosts,
    "createdPost" => $createdPost,
    "updatedPost" => $updatedPost,
    "deletedPost" => $deletedPost,
]);
echo '</pre>';