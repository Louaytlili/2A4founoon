<?php
class Categorie
{
    private ?int $idCategorie = null;
    private ?string $Visual = null;
    private ?string $Abstract = null;
    private ?string $Futurism = null;

    public function __construct($id = null, $v, $a, $f)
    {
        $this->idCategorie = $id;
        $this->Visual = $v;
        $this->Abstract = $a;
        $this->Futurism = $f;
    }

    // Getter and setter methods...
}
