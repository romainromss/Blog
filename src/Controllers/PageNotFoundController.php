<?php

namespace Romss\Controllers;


class PageNotFoundController extends Controller
{

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        return $this->render('Errors/404');
    }
}