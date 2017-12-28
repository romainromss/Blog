<?php

namespace Romss\Models;

class PostsTable extends Table
{
    public function all()
    {
        $posts = $this->db->prepare('SELECT id, title, content, author, creation_date, img, chapo FROM blog.posts');
        $posts->execute();
        $reqPosts = $posts->fetchAll();
        return $reqPosts;
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