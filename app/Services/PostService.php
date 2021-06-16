<?php

namespace App\Services;

use App\Repositories\Contracts\PostRepositoryInterface;

class PostService
{
    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getPosts()
    {
        return $this->repository->getPosts();
    }

    public function getPostByUuid(string $uuid)
    {
        return $this->repository->getPostByUuid($uuid);
    }

    public function createNewPost(array $request)
    {
        return $this->repository->createNewPost($request);
    }

    public function updatePost(array $request, string $uuid)
    {
        return $this->repository->updatePost($request, $uuid);
    }
    
    public function deletePost(string $uuid)
    {
        return $this->repository->deletePost($uuid);
    }
}