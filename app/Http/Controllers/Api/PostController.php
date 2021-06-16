<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidatePost;
use App\Http\Resources\PostResource;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getPosts();
        return PostResource::collection($posts);
    }

    public function show($uuid)
    {
        if(!$post = $this->postService->getPostByUuid($uuid))
            return response()->json(['message' => 'Not Found'], 404);

        return new PostResource($post);
    }

    public function store(ValidatePost $request)
    {
        $post = $this->postService->createNewPost($request->all());
        return new PostResource($post);
    }
    
    public function update(ValidatePost $request, $uuid)
    {
        $post = $this->postService->updatePost($request->all(), $uuid);
        return new PostResource($post);
    }
    
    public function destroy($uuid)
    {
        return $this->postService->deletePost($uuid);
    }
}
