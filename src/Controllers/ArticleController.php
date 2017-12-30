<?php

namespace Romss\Controllers;


use Romss\Models\PostsTable;

class ArticleController extends Controller
{

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function showArticles()
    {
        $postsTable = new PostsTable($this->db);
        $posts = $postsTable->all();
        return $this->render('Article/post', compact('posts'));
    }


    /**
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(array $params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            return $this->showArticles();
        }
        return 'Not Found';
    }

}