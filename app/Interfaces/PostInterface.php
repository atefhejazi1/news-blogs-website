<?php

namespace App\Interfaces;

interface PostInterface
{
    public function getAllPosts();
    public function getPostById($id);
    public function createPost(array $data);
    public function updatePost($id, array $data);
    public function deletePost($id);
}
