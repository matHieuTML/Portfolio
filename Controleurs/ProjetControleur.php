<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Projet;

class ProjetControleur {
    public function liste()
    {
        $projet = Bdd::select("projet");
        
        include "vues/header.html.php";
        include "vues/projet/table.html.php";
        include "vues/footer.html.php";        
    }
    public function listeUser($projet, $lang)
    {
        $projet = Bdd::select($projet, $lang);
        return $projet;
        
    }

    public function ajouter()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new Projet;
            $l->setLang($_POST["lang"]);
            $l->setTitre($_POST["titre"]);
            $l->setPhoto($_POST["photo"]);
            $l->setDescription($_POST["description"]);
        
            $resultat = Bdd::insertProjet($l);
        
            if( $resultat ){
                header("Location: projet.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }
        
        // AFFICHAGE
        $projet = new Projet;
        include "vues/header.html.php";
        require "vues/projet/form.html.php";
        include "vues/footer.html.php";
    }
    public function ajouterUser()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new Projet;
            $l->setLang($_POST["lang"]);
            $l->setTitre($_POST["titre"]);
            $l->setPhoto($_POST["photo"]);
            $l->setDescription($_POST["description"]);
        
            $resultat = Bdd::insertProjet($l);
        
            if( $resultat ){
                header("Location: projet_liste.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }

    }

    public function modifier($id)
    {
        $projet = Bdd::selectById("projet", $id);
        
        if($_POST){
            $lang = $_POST["lang"] ?? null;
            $titre = $_POST["titre"] ?? null;
            $photo = $_POST["photo"] ?? null;
            $description = $_POST["description"] ?? null;
        
            if( !empty($titre) && !empty($photo) ) {
                if( strlen($titre) > 75 ) {
                    $erreurs["titre"] = "Le titre ne doit pas dépasser 75 caractères";
                }
                if( strlen($description) > 1000 ) {
                    $erreurs["description"] = "Le contenu ne doit pas dépasser 1000 caractères";
                }

            } else {
                $erreurs["generale"] = "Veuillez remplir les champs requis";
            }
        
            if( empty($erreurs) ){
                $projet->setLang($lang);
                $projet->setTitre($titre);
                $projet->setPhoto($photo);
                $projet->setDecription($description);
                if( Bdd::updateProjet($projet) ){
                    redirection(lien("projet"));
                } else {
                    $erreurs["generale"] = "Erreur lors de la modification en bdd";
                }
            }
        
        }
        include "vues/header.html.php";
        include "vues/projet/form.html.php";
        include "vues/footer.html.php";
    }

    public function supprimer($id)
    {

        if($id) {
            if( is_numeric($id) ) {
                $projet = Bdd::selectById("projet", $id);

                if($projet) {
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if( Bdd::deleteProjet($projet) == 1 ) {
                            redirection(lien("projet"));
                        }
                    }
                } else {
                    redirection(lien("projet"));
                }
            }
        }
        affichage("projet/suppression.html.php", [ "projet" => $projet ]);
    }
}