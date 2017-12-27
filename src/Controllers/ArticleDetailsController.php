<?php

namespace Romss\Controllers;


use Romss\Models\CommentsTable;
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
    private function getArticleWithComments(int $id)
    {
        $posts = new PostsTable($this->db);
        $post = $posts->getPost($id)->fetch();

        $comment = new CommentsTable($this->db);
        $comments = $comment->getComments($id);

        return $this->render('Article/postdetails', ['post' => $post, 'comments' => $comments]);
    }

    private function postComments(int $id)
    {
        $addComment = new CommentsTable($this->db);

        $author = $this->post('author');
        $comment = $this->post('comment');

        $addComment->addComment($id, $author, $comment);
        $this->redirect('/article/details/'.$id);
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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->getArticleWithComments($params['id'] ?? 0);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->postComments($params['id'] ?? 0);
        }
        return 'Not found';
    }
}

