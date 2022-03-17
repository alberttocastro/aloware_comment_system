<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_creates_comment()
    {
        $response = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment']);

        $response->assertStatus(201);
    }

    public function test_it_creates_comment_with_parent()
    {
        $parentResponse = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment']);
        $parentId = $parentResponse['id'];

        $response = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a reply comment', 'parent_comment_id' => $parentId]);

        $response->assertStatus(201);
    }

    public function test_it_should_not_create_comment_with_wrong_parent()
    {
        $response = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a reply comment', 'parent_comment_id' => 0]);

        $response->assertStatus(500);
    }

    public function test_it_should_not_create_without_name()
    {
        $response = $this->postJson('/api/comment', ['body' => 'this is a reply comment']);

        $response->assertStatus(422);
    }

    public function test_it_should_not_create_without_body()
    {
        $response = $this->postJson('/api/comment', ['name' => 'commenter']);

        $response->assertStatus(422);
    }

    public function test_it_should_not_create_too_deep()
    {
        $layer0 = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment']);
        $layer1 = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment', 'parent_comment_id' => $layer0['id']]);
        $layer2 = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment', 'parent_comment_id' => $layer1['id']]);
        $layer3 = $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment', 'parent_comment_id' => $layer2['id']]);

        $response =
            $this->postJson('/api/comment', ['name' => 'commenter', 'body' => 'this is a comment', 'parent_comment_id' => $layer3['id']]);

        $response->assertStatus(400);
    }
}