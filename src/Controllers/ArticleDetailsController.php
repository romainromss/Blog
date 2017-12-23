<?php
/**
namespace Romss\Controllers;


use Romss\Models\PostsTable;

/**class ArticleDetailsController extends  Controller
{


    private function getArticle() {
        $postsTable = new PostsTable($this->db);
        $posts = $postsTable->all();
        return $this->render('Article/post', compact('posts'));
    }

    private function postArticle() {
        return 'Je post un article';
    }

    public function __invoke(array $param)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->getArticle();
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->postArticle();
        }
        return  'Not found';
    }

}