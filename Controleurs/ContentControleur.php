<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Content;

class ContentControleur {
    public function liste()
    {
        $content = Bdd::select("content");
        
        include "vues/header.html.php";
        include "vues/content/table.html.php";
        include "vues/footer.html.php";        
    }
    public function afficheCa($attribut){
        $content = Bdd::selectCordonne("content", $attribut);
        return $content;
    }

    public function ajouter()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new Content;
            $l->setFamille($_POST["famille"]);
            $l->setWhat($_POST["what"]);
            $l->setAttribut($_POST["attribut"]);
        
            $resultat = Bdd::insertContent($l);
        
            if( $resultat ){
                header("Location: content.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }
        
        // AFFICHAGE
        $content = new Content;
        include "vues/header.html.php";
        require "vues/content/form.html.php";
        include "vues/footer.html.php";
    }
    public function ajouterUser()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new Content;
            $l->setFamille($_POST["famille"]);
            $l->setWhat($_POST["what"]);
            $l->setAttribut($_POST["attribut"]);
        
            $resultat = Bdd::insertContent($l);
        
            if( $resultat ){
                header("Location: Content_liste.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }

    }

    public function modifier($id)
    {
        $content = Bdd::selectById("content", $id);
        
        if($_POST){
            $famille = $_POST["famille"] ?? null;
            $what = $_POST["what"] ?? null;
            $attribut = $_POST["attribut"] ?? null;
        
            if( !empty($famille) && !empty($what) ) {
                if( strlen($famille) > 75 ) {
                    $erreurs["famille"] = "Le famille ne doit pas dépasser 75 caractères";
                }
                if( strlen($attribut) > 5000 ) {
                    $erreurs["attribut"] = "Le contenu ne doit pas dépasser 5000 caractères";
                }

            } else {
                $erreurs["generale"] = "Veuillez remplir les champs requis";
            }
        
            if( empty($erreurs) ){
                $content->setFamille($famille);
                $content->setWhat($what);
                $content->setAttribut($attribut);
                if( Bdd::updateContent($content) ){
                    redirection(lien("content"));
                } else {
                    $erreurs["generale"] = "Erreur lors de la modification en bdd";
                }
            }
        
        }
        include "vues/header.html.php";
        include "vues/content/form.html.php";
        include "vues/footer.html.php";
    }

    public function supprimer($id)
    {

        if($id) {
            if( is_numeric($id) ) {
                $content = Bdd::selectById("content", $id);

                if($content) {
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if( Bdd::deleteContent($content) == 1 ) {
                            redirection(lien("content"));
                        }
                    }
                } else {
                    redirection(lien("content"));
                }
            }
        }
        affichage("content/suppression.html.php", [ "content" => $content ]);
    }
}