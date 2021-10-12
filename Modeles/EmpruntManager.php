<?php
  
namespace Modeles;

use PDO;
use Modeles\Emprunt;


class EmpruntManager {

    private $pdo;

    private $pdoStatement;

    
    public function __construct() {
        try {
            $this->pdo = new PDO("pgsql:host=localhost;port=5432;dbname=mediatheque;user=postgres;password=bddcinema");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (PDOException $e) {
            echo 'echec de la connexion';
        }    
    }

    public function create($emprunt) {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO emprunts (utilisateurid,bookid,dateresa,datefinresa,dateemprunt,dateretour)
                                                    VALUES (?,?,?,?,?,?)');
        $this->pdoStatement->bindValue(1,$emprunt->getUtilisateurId(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(2,$emprunt->getBookId(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(3,$emprunt->getDateResa(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(4,$emprunt->getDateFinResa(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(5,$emprunt->getDateEmprunt(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(6,$emprunt->getDateRetour(), PDO::PARAM_STR);
        
        return $exeOk = $this->pdoStatement->execute();
           
    } 

    public function read($utilisateurid) {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM emprunts WHERE utilisateurid = ?');
        $this->pdoStatement->bindValue(1, $utilisateurid, PDO::PARAM_INT);
        $exeOk = $this->pdoStatement->execute();

        if ($exeOk) {
            $emprunts = [];

            while($emprunt = $this->pdoStatement->fetchObject('Modeles\emprunt')) {
                $emprunts[] = $emprunt; 
            }
            return $emprunts;
        } else {
            return false;
        }
    }

    public function readAll() {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM emprunts ORDER BY utilisateurId
                                                                        JOIN ');

        $emprunts = [];

        while ($emprunt = $this->pdoStatement->fetchObject('Modeles\emprunt')) {
            $emprunts[] = $emprunt;
        }
        
        return $emprunts;
    }

    public function update($emprunt, $book) {
        $this->pdoStatement = $this->pdo->prepare('UPDATE emprunts SET utilisateurid=?, 
                                                         dateresa=?, datefinresa=?, dateemprunt=?, dateretour=?
                                                   WHERE bookid=? ');
        $this->pdoStatement->bindValue(1,$emprunt->getUtilisateurId(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(2,$emprunt->getDateResa(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(3,$emprunt->getDateFinResa(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(4,$emprunt->getDateEmprunt(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(5,$emprunt->getDateRetour(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(6,$book);
       
        return $exeOk = $this->pdoStatement->execute();
    }

    public function delete($book) {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM emprunts WHERE bookid = :id');
        $this->pdoStatement->bindValue(':id',$book, PDO::PARAM_INT);

        return $exeOk = $this->pdoStatement->execute();
    }

    public function checkFinResaDate() {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM emprunts');

        $resas = [];

        while ($resa = $this->pdoStatement->fetchObject('Modeles\emprunt')) {
            $resas[] = $resa;
        }
        
        return $resas;
    }

}
