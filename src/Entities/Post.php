<?php

namespace Romss\Entities;

/**
 * Class Post
 * @package Romss\Entities
 */
class Post extends Entity
{
    private $errors = [],
        $id,
        $title,
        $content,
        $author,
        $creation_date;


    const author_invalid = 1;
    const title_invalid = 2;
    const content_invalid = 3;

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

    public function setTitle($title)
    {
        if (!is_string($title) || empty($title))
        {
            $this->errors[] = self::title_invalid;
        }
        else
        {
            $this->title = $title;
        }
    }

    public function setContent($content)
    {
        if (!is_string($content) || empty($content))
        {
            $this->errors[] = self::content_invalid;
        }
        else
        {
            $this->content = $content;
        }
    }

    public function setCreation_date($creation_date)
    {
        $this->creation_date = $this->setDateTime($creation_date);
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

    public function author()
    {
        return $this->author;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function creation_date()
    {
        return $this->creation_date;
    }

}
