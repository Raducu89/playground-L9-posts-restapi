<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Http\Resources\PostResource;

use App\Services\PostService;

use App\Models\Post;

use Carbon\Carbon;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection($this->postService->getAllPosts());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validatedData = $request->validated();

        $post = $this->postService->createPost($validatedData);
        return (new PostResource($post))
            ->additional(['message' => 'Post created successfully'], 201);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new PostResource($this->postService->getPostById($id)))
            ->additional(['message' => 'Post retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {   
        $validatedData = $request->validated();

        $post = Post::findOrFail($id);
        $post = $this->postService->updatePost($post, $validatedData );
        return (new PostResource($post))
            ->additional(['message' => 'Post updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);
        return response()->json(['message' => 'Post deleted successfully'], 204);
    }
}
