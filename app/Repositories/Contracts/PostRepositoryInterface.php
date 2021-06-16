<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function getPosts();
    public function getPostByUuid(string $uuid);
    public function createNewPost(array $request);
    public function updatePost(array $request, string $uuid);
    public function deletePost(string $uuid);
}