<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase; // Useful for ensuring a clean database state for each test
use Tests\TestCase;
use App\Models\Post; // Import the Post model

class PostControllerTest extends TestCase
{
    use RefreshDatabase; // This trait will migrate the database before each test and roll it back after

    /** @test */
    public function it_successfully_creates_a_post_and_redirects(): void
    {
        $postData = [
            'title' => 'Test Post Title from Test',
            'body' => 'This is the body of the test post.',
        ];

        $response = $this->post(route('posts.store'), $postData);

        $response->assertRedirect(route('posts.index'));
        $this->assertDatabaseHas('posts', $postData);
        $response->assertSessionHasNoErrors(); // Ensure no unexpected validation errors
    }

    /** @test */
    public function it_shows_validation_errors_for_missing_title(): void
    {
        $invalidPostData = [
            'body' => 'This post is missing a title.',
            // title is intentionally omitted
        ];

        $response = $this->post(route('posts.store'), $invalidPostData);

        $response->assertStatus(302); // Should redirect back
        $response->assertSessionHasErrors(['title']);
        $this->assertDatabaseMissing('posts', [
            'body' => 'This post is missing a title.',
        ]);
    }

    /** @test */
    public function it_shows_validation_errors_for_missing_body(): void
    {
        $invalidPostData = [
            'title' => 'Valid Title, Missing Body',
            // body is intentionally omitted
        ];

        $response = $this->post(route('posts.store'), $invalidPostData);

        $response->assertStatus(302); // Should redirect back
        $response->assertSessionHasErrors(['body']);
        $this->assertDatabaseMissing('posts', [
            'title' => 'Valid Title, Missing Body',
        ]);
    }

    /** @test */
    public function it_shows_validation_errors_for_title_exceeding_max_length(): void
    {
        $longTitle = str_repeat('a', 256); // Max is 255
        $invalidPostData = [
            'title' => $longTitle,
            'body' => 'This post has a title that is too long.',
        ];

        $response = $this->post(route('posts.store'), $invalidPostData);

        $response->assertStatus(302); // Should redirect back
        $response->assertSessionHasErrors(['title']);
        $this->assertDatabaseMissing('posts', [
            'body' => 'This post has a title that is too long.',
        ]);
    }
}
