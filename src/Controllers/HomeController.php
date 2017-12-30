<?php
namespace Romss\Controllers;


class HomeController extends Controller
{


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
                var_dump($_SESSION);
                return $this->render('home/home');
        }
        return 'Not Found';
      }
}

