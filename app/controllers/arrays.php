<?php

require 'views/arrays.view.php';

class Post
{
    public $title;

    public $published;

    public function __construct($title, $published)
    {
        $this->title = $title;
        $this->published = $published;
    }
}

$posts = [
    new Post('My First Post', true),
    new Post('My Second Post', true),
    new Post('My Third Post', true),
    new Post('My Final Post', false),
];

// $unpublishedPosts = array_filter($posts, function ($post) {
//  return ! $post->published;
// });

// var_dump($unpublishedPosts);

// $modified = array_map(function ($post) {
//  $post->published = true;
//  return $post;
// }, $posts);

// $modified = array_map(function ($post) {
//  return ['title' => $post->title];
// }, $posts);

// $title = array_map(function ($post) {
//  return $post->title;
// }, $posts);

$titles = array_column($posts, 'title');

var_dump($titles);
