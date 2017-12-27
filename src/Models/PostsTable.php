<?php

namespace Romss\Models;

use Romss\Entities\Post;

class PostsTable extends Table
{
    public function all()
    {
        $reqPosts = $this->db->request('SELECT id, title, content, author, creation_date, img FROM blog.posts');
        $posts = [];

        foreach ($reqPosts as $post) {
            $posts[] = new Post($post);
        }

        return $posts;
    }


    public function getPost($id)
    {
        $post = $this->db->prepare('SELECT * FROM blog.posts WHERE id = :id');
        $post->execute([
            ':id' => $id
        ]);
        return $post;
    }
}