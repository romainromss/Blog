<?php

namespace Romss\Controllers;


use Romss\Models\PostsTable;

class ArticleDetailsController extends  Controller
{
    /**
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function getArticle(int $id) {
        $posts = new PostsTable($this->db);
        $post = $posts->getPost($id)->fetch();

        return  $this->render('Article/postdetails', ['post' => $post]);
    }

    /**
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    function __invoke(array $params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            return $this->getArticle($params['id'] ?? 0);
        }
        return  'Not found';
    }

}