<?php

namespace Romss\Controllers;

use Twig_Environment;

class Controller
{
    protected $db;
    protected $twig;

    public function __construct($db, Twig_Environment $twig)
    {
        $this->db = $db;
        $this->twig = $twig;
    }

    /**
     * @param string $field
     * @return null|string
     */
    public function post(string $field)
    {
        return $_POST[$field] ?? null;
    }

    public function redirect($url)
    {
        header('HTTP/1.1 301 Moved Permanently', false, 301);
        header('Location: ' . $url);
        exit();
    }

    public function getInput($input): ?string
    {
        if (isset($_POST[$input])) return $input;
        return null;
    }

    public function setFlash($type, $content)
    {
        $_SESSION['flash'] = compact('type', 'content');
    }

    /**
     * Permet d'enregistrer les erreurs et le formulaire
     *
     * @param array $errors
     * @param array $post
     */
    public function setErrors($errors, $post)
    {
        // On enregistre notre formulaire
        $_SESSION['post'] = $post;

        $content = '<span>Des erreurs sont survenues:</span><ul>';
        foreach ($errors as $error) {
            $content .= '<li>'.$error.'</li>';
        }
        $content .= '</ul>';

        // On enregistre le contenu de l'erreur
        $this->setFlash('danger', $content);
    }

    /**
     * @param $file
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function render($file, $params = [])
    {
        if (isset($_SESSION['flash'])) {
            $params['__flash'] = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }

        $params['__session'] = $_SESSION;
        $params['__page'] = $file.'.html.twig';

        return $this->twig->render($file.'.html.twig', $params);
    }
}
