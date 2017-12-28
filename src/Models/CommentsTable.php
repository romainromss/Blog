<?php

namespace Romss\Models;

use Romss\Entities\Comment;

class CommentsTable extends Table
{
    public function all ()
    {
        $comments = $this->db->prepare('SELECT id, title, content, author, creation_date FROM blog.posts');
        $comments->execute();
        $reqComments = $comments->fetchAll();
        return $reqComments;
    }


    public function getComments($postId)
    {
        $comments = $this->db->prepare('SELECT * FROM blog.comments WHERE post_id = :postId ORDER BY comment_date DESC');
        $comments->execute([
            ':postId' => $postId
        ]);

        return $comments;
    }

    public function addComment($postId, $author, $comment)
    {
        $comments = $this->db->prepare('INSERT INTO blog.comments(post_id, author, comment, comment_date) VALUES(:postId, :author, :comment, NOW())');
        $comments->execute([
            ':postId' => $postId,
            ':author' =>$author,
            ':comment'=> $comment]);

        return $this->db->lastInsertId();
    }
}
