<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    /**
     * PostRepository constructor.
     * 
     * @param \App\Models\Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }   

    /**
     * Get all posts
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->post->all();
    }

    /**
     * Get post by id
     * 
     * @param int $id
     * @return \App\Models\Post
     */
    public function find($id)
    {
        return $this->post->find($id);
    }

    /**
     * Create a new post
     * 
     * @param array $data
     * @return \App\Models\Post
     */
    public function create(array $data)
    {
        return $this->post->create($data);
    }

    /**
     * Update a post
     * 
     * @param \App\Models\Post $post
     * @param array $data
     * @return \App\Models\Post
     */
    public function update(Post $post, array $data)
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
    public function delete(Post $post)
    {
        $post->delete();
    }

}