<?php

namespace Oquiz\Controllers;

class QuizController extends CoreController {

  public function read( $params ) {

    $id = $params['id'];

    $question = \Oquiz\Models\QuestionModel::find($id);
    $quiz = \Oquiz\Models\QuizModel::find($id);

    echo $this->templates->render( 'quiz/read',[
        'quiz' => $quiz,
        'questions' => $question
    ]);
  }
  
}
