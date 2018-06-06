<?php

namespace Oquiz\Models;

class QuestionModel extends CoreModel {

    protected static $tableName = 'questions';

    protected $id;
    protected $id_quiz;
    protected $question;
    protected $prop1;
    protected $prop2;
    protected $prop3;
    protected $prop4;
    protected $id_level;
    protected $anecdote;
    protected $wiki;
    protected $name;

    public static function find($id) {

        // On construit la requête SQL
        $sql = 'SELECT questions.id, id_quiz, question, prop1, prop2, prop3, prop4, id_level, anecdote, wiki, levels.name FROM questions INNER JOIN levels ON questions.id_level = levels.id WHERE id_quiz = :id';

        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();

        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':id', $id, \PDO::PARAM_INT );
        $stmt->execute();
        // On récupère les résultats
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of Id Quizz
     *
     * @return mixed
     */
    public function getIdQuizz()
    {
        return $this->id_quizz;
    }

    /**
     * Set the value of Id Quizz
     *
     * @param mixed id_quizz
     *
     * @return self
     */
    public function setIdQuizz($id_quizz)
    {
        $this->id_quizz = $id_quizz;

        return $this;
    }

    /**
     * Get the value of Question
     *
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of Question
     *
     * @param mixed question
     *
     * @return self
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of Prop
     *
     * @return mixed
     */
    public function getProp1()
    {
        return $this->prop1;
    }

    /**
     * Set the value of Prop
     *
     * @param mixed prop1
     *
     * @return self
     */
    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;

        return $this;
    }

    /**
     * Get the value of Prop
     *
     * @return mixed
     */
    public function getProp2()
    {
        return $this->prop2;
    }

    /**
     * Set the value of Prop
     *
     * @param mixed prop2
     *
     * @return self
     */
    public function setProp2($prop2)
    {
        $this->prop2 = $prop2;

        return $this;
    }

    /**
     * Get the value of Prop
     *
     * @return mixed
     */
    public function getProp3()
    {
        return $this->prop3;
    }

    /**
     * Set the value of Prop
     *
     * @param mixed prop3
     *
     * @return self
     */
    public function setProp3($prop3)
    {
        $this->prop3 = $prop3;

        return $this;
    }

    /**
     * Get the value of Prop
     *
     * @return mixed
     */
    public function getProp4()
    {
        return $this->prop4;
    }

    /**
     * Set the value of Prop
     *
     * @param mixed prop4
     *
     * @return self
     */
    public function setProp4($prop4)
    {
        $this->prop4 = $prop4;

        return $this;
    }

    /**
     * Get the value of Id Level
     *
     * @return mixed
     */
    public function getIdLevel()
    {
        return $this->id_level;
    }

    /**
     * Set the value of Id Level
     *
     * @param mixed id_level
     *
     * @return self
     */
    public function setIdLevel($id_level)
    {
        $this->id_level = $id_level;

        return $this;
    }

    /**
     * Get the value of Anecdote
     *
     * @return mixed
     */
    public function getAnecdote()
    {
        return $this->anecdote;
    }

    /**
     * Set the value of Anecdote
     *
     * @param mixed anecdote
     *
     * @return self
     */
    public function setAnecdote($anecdote)
    {
        $this->anecdote = $anecdote;

        return $this;
    }

    /**
     * Get the value of Wiki
     *
     * @return mixed
     */
    public function getWiki()
    {
        return $this->wiki;
    }

    /**
     * Set the value of Wiki
     *
     * @param mixed wiki
     *
     * @return self
     */
    public function setWiki($wiki)
    {
        $this->wiki = $wiki;

        return $this;
    }


    /**
     * Get the value of Table Name
     *
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set the value of Table Name
     *
     * @param mixed tableName
     *
     * @return self
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }
    
    /**
     * Get the value of Id Quiz
     *
     * @return mixed
     */
    public function getIdQuiz()
    {
        return $this->id_quiz;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

}
