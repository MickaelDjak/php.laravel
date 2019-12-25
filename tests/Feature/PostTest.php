<?php

namespace Tests\Feature;

use App\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Undocumented class
 */
class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testNoOnePostPresentInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('Post list');
        $response->assertSeeText('No one post present');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        $post = $this->crateDummyBlogPost();

        $this->get('/posts')
            ->assertSeeText('Post list')
            ->assertSeeText('New title of post')
            ->assertSeeText('No one comments');

        $this->assertDatabaseHas('blog_posts', $post->toArray());
    }

    public function testSee1BlogPostWithComments()
    {
        $post = $this->crateDummyBlogPost();
        factory(\App\Comment::class, 4)->create(['blog_post_id' => $post->id]);

        $this->get('/posts')
            ->assertSeeText('4 comments');
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Validete title',
            'content' => 'At least 10 charactes',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was created!!!');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $message = session('errors')->getMessages();
        $this->assertEquals(current($message['title']), 'The title must be at least 5 characters.');
        $this->assertEquals(current($message['content']), 'The content must be at least 10 characters.');
    }

    public function testUpdateValid()
    {
        $post = $this->crateDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', $post->toArray());
        
        $params = [
            'title' => 'A new name of title',
            'content' => 'Content was changed',
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertDatabaseMissing('blog_posts', $post->toArray());
        $this->assertDatabaseHas('blog_posts', $params);

        $this->assertEquals(session('status'), 'Blog post was updated!!!');
    }

    public function testDeleteValid()
    {
        $post = $this->crateDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertDatabaseMissing('blog_posts', $post->toArray());

        $this->assertEquals(session('status'), 'Blog post was deleted!!!');
    }


    /**
     * @return BlogPost
     */
    private function crateDummyBlogPost(): BlogPost
    {
        return factory(BlogPost::class)->states('test-new-title')->create();
    }
}
