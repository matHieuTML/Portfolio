<?php
namespace Modeles\Entites;
class Content {
    private $id;
    private $famille;
    private $what;
    private $attribut;


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
     * Get the value of famille
     */ 
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set the value of famille
     *
     * @return  self
     */ 
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get the value of what
     */ 
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Set the value of what
     *
     * @return  self
     */ 
    public function setWhat($what)
    {
        $this->what = $what;

        return $this;
    }

    /**
     * Get the value of attribut
     */ 
    public function getAttribut()
    {
        return $this->attribut;
    }

    /**
     * Set the value of attribut
     *
     * @return  self
     */ 
    public function setAttribut($attribut)
    {
        $this->attribut = $attribut;

        return $this;
    }
}