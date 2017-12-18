<?php

namespace Romss\Models;

use Romss\Entities\Post;

class PostsTable extends Table
{
    public function all ()
    {
        $reqPosts = $this->db->request('SELECT * FROM blog.posts');
        $posts = [];

        foreach ($reqPosts as $post) {
            $posts[] = new Post($post);
        }

        return $posts;
    }
}
