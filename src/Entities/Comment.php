<?php

namespace Romss\Entities;

/**
 * Class Comment
 * @package Romss\Entities
 */
class Comment extends Entity

{
    private $errors = [],
            $id,
            $post_id,
            $author,
            $comment,
            $comment_date;


    const author_invalid = 1;
    const comment_invalid = 2;

    public function __construct($data = [])
    {
        if (!empty($data))
        {
            $this->hydrate($data);
        }

    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
        }
    }

    // SETTERS //

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setPostId($post_id)
    {
            $this->post_id = (int) $post_id;
    }

    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author))
        {
            $this->errors[] = self::author_invalid;
        }
        else
        {
            $this->author = $author;
        }
    }

    public function setContent($comment)
    {
        if (!is_string($comment) || empty($comment))
        {
            $this->errors[] = self::comment_invalid;
        }
        else
        {
            $this->comment = $comment;
        }
    }

    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }


    // GETTERS //

    public function errors()
    {
        return $this->errors;
    }

    public function id()
    {
        return $this->id;
    }

    public function post_id()
    {
        return $this->post_id;
    }

    public function author()
    {
        return $this->author;
    }

    public function comment()
    {
        return $this->comment;
    }

    public function comment_date()
    {
        return $this->comment_date();
    }

}




