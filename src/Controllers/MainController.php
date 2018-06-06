<?php

namespace Oquiz\Controllers;

class MainController extends CoreController {

    public function home() {

        //On recupère la liste des quizzes
        $list = \Oquiz\Models\QuizModel::findAll();
        //On affiche le template et on lui donne les infos recuperées
        echo $this->templates->render( 'main/home', ['quizzes' => $list]);
    }
  }
