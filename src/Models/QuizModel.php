<?php

namespace Oquiz\Models;

class QuizModel extends CoreModel {

    protected static $tableName = 'quizzes';

    protected $id;
    protected $title;
    protected $description;
    protected $id_author;
    protected $first_name;
    protected $last_name;
    protected $email;

    public static function findAll() {

        // On construit la requête SQL
        $sql = 'SELECT quizzes.id, title, description, first_name, last_name, email FROM quizzes INNER JOIN users ON quizzes.id_author = users.id ORDER BY quizzes.title ASC';
        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();
        // On exécute la requête SQL
        $stmt = $conn->query( $sql );
        // On retourne les résultats
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public static function find($id) {

        // On construit la requête SQL
        $sql = 'SELECT * FROM quizzes INNER JOIN users ON quizzes.id_author = users.id WHERE quizzes.id = :id';
        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':id', $id, \PDO::PARAM_INT );
        $stmt->execute();
        // On récupère les résultats
        return $stmt->fetchObject( self::class );
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
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param mixed title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Id Author
     *
     * @return mixed
     */
    public function getIdAuthor()
    {
        return $this->id_author;
    }

    /**
     * Set the value of Id Author
     *
     * @param mixed id_author
     *
     * @return self
     */
    public function setIdAuthor($id_author)
    {
        $this->id_author = $id_author;

        return $this;
    }

    /**
     * Get the value of First Name
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set the value of First Name
     *
     * @param mixed first_name
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of Last Name
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of Last Name
     *
     * @param mixed last_name
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
?>
