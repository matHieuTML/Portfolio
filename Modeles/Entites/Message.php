<?php
namespace Modeles\Entites;
class Message {
    private $id;
    private $nom;
    private $email;
    private $content;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of auteur
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of resume
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of resume
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}