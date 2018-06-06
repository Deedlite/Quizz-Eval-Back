<?php
namespace Oquiz;

class Application {

    public function __construct() {

        $this->router = new \AltoRouter();

        $this->router->setBasePath( $_SERVER['BASE_URI'] );

    }

    public function initRoutes() {

        $this->router->map('GET', '/', ['MainController', 'home'], 'home');
        $this->router->map('GET|POST', '/quiz/[i:id]', ['QuizController', 'read'], 'quiz_read');
        $this->router->map('GET|POST', '/login', ['MemberController', 'login'], 'login');
        $this->router->map('GET', '/logout', ['MemberController', 'logout'], 'logout');
        $this->router->map('GET|POST', '/signup', ['MemberController', 'signup'], 'signup');
        $this->router->map('GET|POST', '/profile', ['MemberController', 'me'], 'profile');
    }

    public function matching() {
        // On demande à Altorouter si il connait l'URL
        // qui est demandée par le navigateur
        $match = $this->router->match();

        if (!$match) {
            // Altorouter n'a pas trouvé la route,
            // on doit afficher une erreur
            die('Route inconnue');
        }
        else {
            // Altorouter a bien trouvé la route
            // correspondante, on récupère infos
            $data = $match['target'];
            $controllerName = '\Oquiz\Controllers\\' . $data[0];
            $methodName = $data[1];
            // On instancie le controller
            $controller = new $controllerName( $this->router );
            // On exécute la méthode
            $controller->$methodName( $match['params'] );
        }
    }
}
