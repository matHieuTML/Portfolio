<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Message;

class MessageControleur {
    public function liste()
    {
        $message = Bdd::select("message");
        
        include "vues/header.html.php";
        include "vues/message/table.html.php";
        include "vues/footer.html.php";        
    }

    public function ajouter()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new Message;
            $l->setNom($_POST["nom"]);
            $l->setEmail($_POST["email"]);
            $l->setContent($_POST["content"]);
        
            $resultat = Bdd::insertMessage($l);
        
            if( $resultat ){
                header("Location: message_liste.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }
        
        // AFFICHAGE
        $message = new Message;
        include "vues/header.html.php";
        require "vues/message/form.html.php";
        include "vues/footer.html.php";
    }
    public function ajouterUser()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new Message;
            $l->setNom($_POST["nom"]);
            $l->setEmail($_POST["email"]);
            $l->setContent($_POST["content"]);
        
            $resultat = Bdd::insertMessage($l);
        
            if( $resultat ){
                header("Location: message_liste.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }

    }

    public function modifier($id)
    {
        $message = Bdd::selectById("message", $id);
        
        if($_POST){
            $nom = $_POST["nom"] ?? null;
            $email = $_POST["email"] ?? null;
            $content = $_POST["content"] ?? null;
        
            if( !empty($nom) && !empty($email) ) {
                if( strlen($nom) > 75 ) {
                    $erreurs["nom"] = "Le nom ne doit pas dépasser 75 caractères";
                }
                if( strlen($email) < 2 ) {
                    $erreurs["email"] = "L'email doit avoir au moins 2 caractères";
                }
                if( strlen($content) > 1000 ) {
                    $erreurs["content"] = "Le contenu ne doit pas dépasser 1000 caractères";
                }

            } else {
                $erreurs["generale"] = "Veuillez remplir les champs requis";
            }
        
            if( empty($erreurs) ){
                $message->setNom($nom);
                $message->setEmail($email);
                $message->setContent($content);
                if( Bdd::updateMessage($message) ){
                    redirection(lien("message"));
                } else {
                    $erreurs["generale"] = "Erreur lors de la modification en bdd";
                }
            }
        
        }
        include "vues/header.html.php";
        include "vues/message/form.html.php";
        include "vues/footer.html.php";
    }

    public function supprimer($id)
    {

        if($id) {
            if( is_numeric($id) ) {
                $message = Bdd::selectById("message", $id);

                if($message) {
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if( Bdd::deleteMessage($message) == 1 ) {
                            redirection(lien("message"));
                        }
                    }
                } else {
                    redirection(lien("message"));
                }
            }
        }
        affichage("message/suppression.html.php", [ "message" => $message ]);
    }
}