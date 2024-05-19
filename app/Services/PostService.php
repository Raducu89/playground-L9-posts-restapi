<?php 

namespace App\Services;

use App\Models\Post;

class PostService
{   
    /**
     * Get all posts
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts()
    {
        return Post::all();
    }

    /**
     * Get post by id
     * 
     * @param int $id
     * @return \App\Models\Post
     */
    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Create a new post
     * 
     * @param array $data
     * @return \App\Models\Post
     */
    public function createPost(array $data)
    {
        return Post::create($data);
    }

    /**
     * Update a post
     * 
     * @param \App\Models\Post $post
     * @param array $data
     * @return \App\Models\Post
     */
    public function updatePost(Post $post, array $data)
    {
        $post->update($data);
        return $post;
    }

    /**
     * Delete a post
     * 
     * @param \App\Models\Post $post
     * @return void
     */
    public function deletePost(Post $post)
    {
        $post->delete();
    }
}