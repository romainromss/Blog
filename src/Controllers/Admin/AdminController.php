<?php

namespace  Romss\Controllers\Admin;

use Romss\Controllers\Controller;

class AdminController extends Controller
{


    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function showPage()
    {
        if (!isset($_SESSION['auth']) || $_SESSION['auth']['rank'] != 3){
            $this->setFlash("danger", "Vous devez être admin pour entrer");
            $this->redirect('/');
        } else return $this->render('Admin/admin');
    }


    private function manageAdmin()
    {

    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function  __invoke()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            return $this->showPage();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->manageAdmin();
        }
        return 'Not Found';
    }
}