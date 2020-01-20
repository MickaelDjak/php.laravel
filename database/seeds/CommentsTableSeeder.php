<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = $this->command->ask('How many comments do you want to create', 150);

        $posts = App\BlogPost::all();

        factory(App\Comment::class, (int) $quantity)
            ->make()
            ->each(function ($comment) use ($posts) {
                $comment->blog_post_id = $posts->random()->id;
                $comment->save();
            });
    }
}
