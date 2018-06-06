<?php

namespace Oquiz\Controllers;

class MemberController extends CoreController {

    public function list() {
        // On récupère la liste des membres
        $list = \Oquiz\Models\MemberModel::findAll();
        // On affiche le template
        echo $this->templates->render( 'member/login', ['members' => $list] );
    }

    //Deconnexion
    public function logout() {
        // On vide la session
        unset( $_SESSION['user'] );
        $_SESSION = [];
        //détruit la session
        session_destroy();
        //redirige l'utilisateur
        $this->redirect( 'home' );
    }

    // Connexion
    public function login() {

        $errors = [];
        // On regarde si on a validé le formulaire
        if ( !empty($_POST) ) {
            // On a bien des données

            // On récupère l'utilisateur qui possède
            // l'adresse mail envoyée dans le formulaire
            $email = $_POST['email'];
            $member = \Oquiz\Models\MemberModel::findByEmail( $email );

            if ( $member === false ) {
                // Personne ne possède cette adresse mail
                $errors[] = "Utilisateur ou mot de passe inconnu";
            }

            else {
                // L'adresse mail existe bien on verifie le mdp
                $hash = $member->getPassword();
                $isValid = password_verify( $_POST['password'], $hash );
                if ( $isValid === false ) {
                    // Ce n'est pas le bon mot de passe
                    $errors[] = "Utilisateur ou mot de passe inconnu";
                }
                else {
                    // C'est le bon mot de passe
                    // On identifie la personne
                    \Oquiz\Models\MemberModel::login( $member );
                }
            }
                // On retourne les erreurs éventuelles
                echo json_encode( $errors );
                exit();
        }
        echo $this->templates->render( 'member/login', [
            'errors' => $errors,
            'fields' => $_POST
        ]);
    }

        // Affiche ma page de profil
    public function me() {
        // On vérifie qu'on est bien connecté
        $user = \Oquiz\Models\MemberModel::getUser();
        if ( !$user ) {

            $this->redirect( 'home' );
        }
        // On récupère toutes les informations pour cet utilisateur
        $member = \Oquiz\Models\MemberModel::find( $user['id'] );
        // On affiche le template de la page
        echo $this->templates->render( 'member/me', [ 'member' => $member ] );
    }

    // Création de compte
    public function signup() {
        $errors = [];
        // On regarde si on reçoit des informations
        if (!empty($_POST)) {
            // On vérifie les données du formulaire
            $errors = \Oquiz\Models\MemberModel::checkData( $_POST );
            // On regarde si il y a des erreurs
            if ( empty($errors) ) {
                // Pas d'erreur
                $member = \Oquiz\Models\MemberModel::signup( $_POST );

            }
            echo json_encode( $errors );
            return;
        }
        // On affiche le formulaire
        echo $this->templates->render( 'member/signup', [
            'errors' => $errors,
            'fields' => $_POST
        ]);
    }
}
