<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserHasPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_has_post()
    {
        // Arrange
        $this->actingAs(User::factory()->create());
        $user = auth()->user();

        // Act
        $post = $user->posts()->create([
            'title' => 'This is an example post',
            'body' => 'Lorem ipsum...',
        ]);

        // Assert
        $this->assertEquals($post->user_id, $user->id);

    }
}
