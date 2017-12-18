<?php

namespace Romss\Controllers;

use Romss\Models\PostsTable;

class HomeController extends Controller
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $postsTable = new PostsTable($this->db);
        $posts = $postsTable->all();

        return $this->render('home/home', compact('posts'));
    }
}
