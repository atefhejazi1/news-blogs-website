<?php

namespace App\Repositories;
use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    public function getAllPosts()
    {
        return Post::all();
    }
    public function getPostById($id) {}
    public function createPost(array $data) {}
    public function updatePost($id, array $data) {}
    public function deletePost($id) {}
}
