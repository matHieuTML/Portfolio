<?php
/**
Le mot-clé 'abstract' avant le mot 'class' permet de définir une classe
abstraite. 
1. Une classe abstraite ne peut être instanciée (on ne peut pas écrire
    $bdd = new Bdd; )
2. Dans une classe abstraite, on peut définir des méthodes abstraites.
    Ces méthodes n'auront pas de code, juste une définition.
        ex: public function test(arg1, arg2);
    Il n'y a pas {} et il y a un ; après les () de la méthode abstraite.
    - Toutes les classes qui héritent d'une classe abtraite doivent 
    implémenter les méthodes abstraites définies dans la classe mère.
    (implémenter = fournir du code à cette méthode)

 */
namespace Modeles;
use PDO;
use Modeles\Entites\Message;  // avec 'use', on définit un alias à la classe Modeles\Entites\Livre
use Modeles\Entites\Projet;  
use Modeles\Entites\Content;  

abstract class Bdd {
    public static function pdo()
    {
        return new \PDO("mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=portfolio","root","root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT ]);

    }

    public static function select(string $table, $lang = null){
        if($lang){
            $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE lang = '$lang'");
            return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
        }else{
            $pdostatement = self::pdo()->query("SELECT * FROM $table");
            return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
        }      
    }

    public static function selectById(string $table, int $id)
    {
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE id = " . $id);
        $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
        return $pdostatement->fetch();
    }
    public static function selectCordonne(string $table, int $id){
        $stmt = self::pdo()->query("SELECT attribut FROM $table WHERE id = " . $id);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    //GESTION DES MESSAGES
    public static function insertMessage(Message $message)
    {
        $texteRequete = "INSERT INTO message (nom, email, content) 
                         VALUES (:nom, :email, :content)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom",  $message->getNom());
        $pdostatement->bindValue(":email", $message->getEmail());
        $pdostatement->bindValue(":content", $message->getContent());
        return $pdostatement->execute();
    }

    public static function updateMessage(Message $message) : bool
    {
        $texteRequete = "UPDATE message 
                         SET nom = :nom, email = :email, content = :content
                         WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom", $message->getNom());
        $pdostatement->bindValue(":email", $message->getEmail());
        $pdostatement->bindValue(":content", $message->getContent());
        $pdostatement->bindValue(":id", $message->getId());
        return $pdostatement->execute();
    }

    public static function deleteMessage(Message $message)
    {
        return self::pdo()->exec("DELETE FROM message WHERE id = " . $message->getId()); 
    }

    //GESTION DES PROJETS
    public static function insertProjet(Projet $projet)
    {
        $texteRequete = "INSERT INTO projet (lang, titre, photo, description) 
                         VALUES (:lang, :titre, :photo, :description)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":lang",  $projet->getLang());
        $pdostatement->bindValue(":titre",  $projet->getTitre());
        $pdostatement->bindValue(":photo", $projet->getPhoto());
        $pdostatement->bindValue(":description", $projet->getDescription());
        return $pdostatement->execute();
    }

    public static function updateProjet(Projet $projet) : bool
    {
        $texteRequete = "UPDATE projet 
                         SET lang = :lang, titre = :titre, photo = :photo, description = :description
                         WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":lang",  $projet->getLang());
        $pdostatement->bindValue(":titre", $projet->getTitre());
        $pdostatement->bindValue(":photo", $projet->getPhoto());
        $pdostatement->bindValue(":description", $projet->getDescription());
        $pdostatement->bindValue(":id", $projet->getId());
        return $pdostatement->execute();
    }

    public static function deleteProjet(Projet $projet)
    {
        return self::pdo()->exec("DELETE FROM projet WHERE id = " . $projet->getId()); 
    }
    //GESTION DES CONTENTS
    public static function insertContent(Content $content)
    {
        $texteRequete = "INSERT INTO content (famille, what, attribut) 
                         VALUES (:famille, :what, :attribut)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":famille",  $content->getFamille());
        $pdostatement->bindValue(":what", $content->getWhat());
        $pdostatement->bindValue(":attribut", $content->getAttribut());
        return $pdostatement->execute();
    }

    public static function updateContent(Content $content) : bool
    {
        $texteRequete = "UPDATE content 
                         SET famille = :famille, what = :what, attribut = :attribut
                         WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":famille", $content->getFamille());
        $pdostatement->bindValue(":what", $content->getWhat());
        $pdostatement->bindValue(":attribut", $content->getAttribut());
        $pdostatement->bindValue(":id", $content->getId());
        return $pdostatement->execute();
    }

    public static function deleteContent(Content $content)
    {
        return self::pdo()->exec("DELETE FROM content WHERE id = " . $content->getId()); 
    }
}
