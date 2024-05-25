<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_post_list()
    {
        Post::factory()->count(5)->create();    

        $response = $this->getJson('api/posts');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    public function test_resturs_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson("api/posts/{$post->id}");

        $response->assertStatus(200)
            ->assertJsonPath('data.id', $post->id);
    }

    public function test_updates_a_post()
    {
        $post = Post::factory()->create();

        $data = [
            'title' => 'New Title',
            'body' => 'New body'
        ];

        $response = $this->putJson("/api/posts/{$post->id}", $data);

        $response->assertStatus(200)
            ->assertJsonPath('data.title', $data['title'])
            ->assertJsonPath('data.body', $data['body']);
    }

    public function test_it_deletes_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(204);
    }
}
