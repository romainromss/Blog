<?php

namespace Romss\Controllers;


use Romss\Models\PostsTable;

class ArticleDetailsController extends  Controller
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function getArticle() {
        $posts = new PostsTable($this->db);
        $posts->getPost('id');
        var_dump($posts);

        return  $this->render('Article/postdetails', ['id' => $posts]);
    }

    /**
     * @param array $param
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    function __invoke(array $param)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            return $this->getArticle();
        }
        return  'Not found';
    }

}