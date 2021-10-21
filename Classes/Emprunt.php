<?php

namespace Classes;
 
class Emprunt {
    private int $utilisateurid;
    private int $bookid;
    private string $dateresa;
    private string $datefinresa;
    private string $dateemprunt;
    private string $dateretour;
    

    public function getUtilisateurId() {
        return $this->utilisateurid;
    }

    public function setUtilisateurId($utilisateurid) {
        $this->utilisateurid = $utilisateurid;
        return $this;
    }

    public function getBookid() {
        return $this->bookid;
    }

    public function setBookid($bookid) {
        $this->bookid = $bookid;
        return $this;
    }

    public function getDateResa() {
        return $this->dateresa;
    }

    public function setDateResa($dateresa) {
        $this->dateresa = $dateresa;
        return $this;
    }

    public function getDateFinResa() {
        return $this->datefinresa;
    }

    public function setDateFinResa($datefinresa) {
        $this->datefinresa = $datefinresa;
        return $this;
    }

    public function getDateEmprunt() {
        return $this->dateemprunt;
    }

    public function setDateEmprunt($dateemprunt) {
        $this->dateemprunt = $dateemprunt;
        return $this;
    }

    public function getDateRetour() {
        return $this->dateretour;
    }

    public function setDateRetour($dateretour) {
        $this->dateretour = $dateretour;
        return $this;
    }
}