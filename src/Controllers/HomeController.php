<?php
namespace Romss\Controllers;


class HomeController extends Controller
{

    public function __invoke(array $params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            try {
                return $this->render('home/home');
            } catch (\Twig_Error_Loader $e) {
            } catch (\Twig_Error_Runtime $e) {
            } catch (\Twig_Error_Syntax $e) {
            }
        }
        return 'Not Found';
      }
}

