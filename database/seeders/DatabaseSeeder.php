<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function ($u) {
            if ($u->id === 1) {
                $u->update(['is_admin' => true, 'email' => 'admin@admin.com']);
            }
        });
        Post::factory(150)->create();
        Comment::factory(350)->create();
    }
}
