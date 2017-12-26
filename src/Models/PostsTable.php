<?php

namespace Romss\Models;

use Romss\Entities\Post;

class PostsTable extends Table
{
    public function all()
    {
        $reqPosts = $this->db->request('SELECT * FROM blog.posts');
        $posts = [];

        foreach ($reqPosts as $post) {
            $posts[] = new Post($post);
        }

        return $posts;
    }


    public function getPost($id)
    {
        $post = $this->db->prepare('SELECT * FROM blog.posts WHERE id = ?');
        $post->execute([
            'id' => $id
        ]);
        return $post;
    }
}