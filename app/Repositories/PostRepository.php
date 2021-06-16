<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    protected $entity;

    public function __construct(Post $post)
    {
        $this->entity = $post;
    }

    public function getPosts()
    {
        return $this->entity->paginate();
    }

    public function getPostByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }
    
    public function createNewPost(array $request)
    {
        return $this->entity->create($request);
    }
    
    public function updatePost(array $request, string $uuid)
    {
        if(!$post = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $post->update($request);

        return $post;
    }

    public function deletePost(string $uuid)
    {
        $post = $this->entity->where('uuid', $uuid)->first();
        
        if(!$post)
            return response()->json(['message' => 'Not Found'], 404 );

        $post->delete();
        
        return response()->json([], 200);
    }
}