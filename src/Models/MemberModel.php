<?php

namespace Oquiz\Models;

class MemberModel extends CoreModel {

    protected static $tableName = 'users';

    protected $id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;

    public static function find( $id ) {
        // On construit la requête SQL
        $sql = 'SELECT * FROM users WHERE id = :id';
        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':id', $id, \PDO::PARAM_INT );
        $stmt->execute();
        // On récupère les résultats
        return $stmt->fetchObject( static::class );
    }


    public static function findAll() {
        // On construit la requête SQL
        $sql = 'SELECT * FROM users';
        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();
        // On exécute la requête SQL
        $stmt = $conn->query( $sql );
        // On retourne les résultats
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public static function findByEmail( $email ) {
        // On construit la requête SQL
        $sql = 'SELECT * FROM users WHERE email LIKE :email';
        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        // On récupère le résultat
        return $stmt->fetchObject( self::class );
    }

    // Inscrit les informations de l'utilisateur en session
    public static function login( $member ) {
        $_SESSION['user'] = [
            'id' => $member->getId(),
            'first_name' => $member->getFirstName(),
            'last_name' => $member->getLastName(),
            'email' => $member->getEmail(),

        ];
    }

    public static function getUser() {
// Retourne les informations de l'utilisateur connecté
        if ( !empty($_SESSION['user']) ) {
            return $_SESSION['user'];
        }

        return false;
    }

    public static function signup( $data ) {
        // On crée un objet vierge
        $member = new self();
        // On renseigne les informations
        $member->setFirstname( $data['first_name'] );
        $member->setLastname( $data['last_name'] );
        $member->setEmail( $data['email'] );
        $member->setPassword( $data['password'] );
        // On enregistre le nouveau compte
        $member->save();

        return $member;
    }

    public function save() {
        // On crée la requête SQL
        $sql = "
            REPLACE INTO users (
                id,
                first_name,
                last_name,
                email,
                password
            )
            VALUES (
                :id,
                :first_name,
                :last_name,
                :email,
                :password
            )";
        // On récupère la connexion à la BDD
        $conn = \Oquiz\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':id', $this->id );
        $stmt->bindValue( ':first_name', $this->first_name );
        $stmt->bindValue( ':last_name', $this->last_name );
        $stmt->bindValue( ':email', $this->email );
        $stmt->bindValue( ':password', $this->password );
        $stmt->execute();
        // On récupère l'ID qui vient d'être généré par MySQL
        $this->id = $conn->lastInsertId();
    }

    public static function checkData( $data ) {
        // Va contenir la liste des erreurs
        $errors = [];
        // On vérifie tous les champs obligatoires
        // Liste des champs obligatoires
        $mandatoryFields = [
            'email' => "Veuillez saisir une adresse mail",
            'password' => "Veuillez renseigner un mot de passe",
            'password_confirm' => "Vous avez oublié de confirmer le mot de passe",
            'first_name' => "Veuillez saisir un prénom",
            'last_name' => "Veuillez saisir un nom",
        ];

        foreach ($mandatoryFields as $fieldName => $msg) {
            // On vérifie tous les champs obligatoires
            if ( empty($data[ $fieldName ]) ) {
                // Erreur, le champs est vide !
                $errors[] = $msg;
            }
        }
        // On vérifie la double saisie de mot de passe
        if ($data['password'] !== $data['password_confirm']) {
            $errors[] = "Confirmation du mot de passe incorrecte";
        }
        // On vérifie le format de l'email
        if ( !filter_var($data['email'], FILTER_VALIDATE_EMAIL) ) {
            $errors[] = "Votre adresse mail n'est pas au bon format";
        }
        return $errors;
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

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

}
