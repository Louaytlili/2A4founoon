<?php
class Shop
{
    private ?int $idShop = null;
    private ?string $nom = null;
    private ?string $prix = null;
    private ?string $artist = null;
    private ?string $description = null;
    private ?string $status = null;
    private ?string $type = null;
    public function __construct($id = null, $n, $p, $a, $d, $s, $t)
    {
        $this->idShop = $id;
        $this->nom = $n;
        $this->prix = $p;
        $this->artist = $a;
        $this->description = $d;
        $this->status = $s;
        $this->type = $t;
    }


    public function getIdShop()
    {
        return $this->idShop;
    }


    public function getnom()
    {
        return $this->nom;
    }


    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    public function getartist()
    {
        return $this->artist;
    }


    public function setartist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getstatus()
    {
        return $this->status;
    }


    public function setstatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function gettype()
    {
        return $this->type;
    }


    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }
}
