<?php
  
namespace Modeles;

use PDO;
use Modeles\Emprunt;


class EmpruntManager {

    private $pdo;

    private $pdoStatement;

    
    public function __construct() {
        try {
            $this->pdo = new PDO("pgsql:host=ec2-52-205-45-219.compute-1.amazonaws.com;
                                port=5432;
                                dbname=df3dj3hddbqsvd;
                                user=nwkhvvvmelwkuk;
                                password=36481953a4951b40d9ff2496dfd22ae8085cd44e5f2dd93e30d2604d1c69bb47");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (PDOException $e) {
            echo 'echec de la connexion';
        }    
    }

    public function create($emprunt) {
        try {
            $this->pdoStatement = $this->pdo->prepare('INSERT INTO emprunts (utilisateurid,bookid,dateresa,datefinresa,dateemprunt,dateretour)
                                                        VALUES (?,?,?,?,?,?)');
            $this->pdoStatement->bindValue(1,$emprunt->getUtilisateurId(), PDO::PARAM_INT);
            $this->pdoStatement->bindValue(2,$emprunt->getBookId(), PDO::PARAM_INT);
            $this->pdoStatement->bindValue(3,$emprunt->getDateResa(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(4,$emprunt->getDateFinResa(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(5,$emprunt->getDateEmprunt(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(6,$emprunt->getDateRetour(), PDO::PARAM_STR);
            
            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la création';
        }                 
    } 

    public function read($utilisateurid) {
        try {
            $this->pdoStatement = $this->pdo->prepare('SELECT emprunts.utilisateurid, emprunts.dateemprunt, emprunts.dateresa,
                                                        emprunts.bookid, books.titre FROM emprunts 
                                                        JOIN books ON emprunts.bookid = books.id
                                                        WHERE emprunts.utilisateurid = ?
                                                        ORDER BY emprunts.dateemprunt');
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
        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function readAll() {
        try {
            $this->pdoStatement = $this->pdo->query('SELECT emprunts.dateemprunt, emprunts.dateresa, books.titre, 
                                                    utilisateurs.email FROM emprunts                                              
                                                    JOIN books ON emprunts.bookid = books.id
                                                    JOIN utilisateurs ON utilisateurs.id = emprunts.utilisateurid
                                                    ORDER BY emprunts.dateemprunt');
            $emprunts = [];

            while ($emprunt = $this->pdoStatement->fetchObject('Modeles\emprunt')) {
                $emprunts[] = $emprunt;
            }
            
            return $emprunts;

        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function update($emprunt, $book) {
        try {
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

        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function delete($book) {
        try {
            $this->pdoStatement = $this->pdo->prepare('DELETE FROM emprunts WHERE bookid = :id');
            $this->pdoStatement->bindValue(':id',$book, PDO::PARAM_INT);

            return $exeOk = $this->pdoStatement->execute();
        
        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function checkFinResaDate() {
        try {
            $this->pdoStatement = $this->pdo->query('SELECT * FROM emprunts');

            $resas = [];

            while ($resa = $this->pdoStatement->fetchObject('Modeles\emprunt')) {
                $resas[] = $resa;
            }
            
            return $resas;

        } catch (PDOException $e) {
            echo 'echec de la lecture';
        } 
    }             
}
