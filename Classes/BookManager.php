<?php
  
namespace Classes;

use PDO;
use Classes\Book;

class BookManager {

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

    public function create($book) {
        try {
            $this->pdoStatement = $this->pdo->prepare('INSERT INTO books (titre,parution,description,auteur,genre,statut,image)
                                                        VALUES (?,?,?,?,?,?,?)');
            $this->pdoStatement->bindValue(1,$book->getTitre(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(2,$book->getParution(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(3,$book->getDescription(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(4,$book->getAuteur(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(5,$book->getGenre(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(6, 1);
            $this->pdoStatement->bindValue(7,$book->getImage(), PDO::PARAM_STR);
        
            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la création';
        }  
    }

    public function read($id) {
        try {
            $this->pdoStatement = $this->pdo->prepare('SELECT * FROM books WHERE id = ?');
            $this->pdoStatement->bindValue(1,$id, PDO::PARAM_INT);
            $exeOk = $this->pdoStatement->execute();

            if ($exeOk) {
                $book = $this->pdoStatement->fetchObject('Classes\Book');
                return $book;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function readByTitre($titre) {
        try {
            $this->pdoStatement = $this->pdo->prepare('SELECT * FROM books WHERE titre = ?');
            $this->pdoStatement->bindValue(1,$titre, PDO::PARAM_INT);
            $exeOk = $this->pdoStatement->execute();

            if ($exeOk) {
                $book = $this->pdoStatement->fetchObject('Classes\Book');
                return $book;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function readAll() {
        try {
            $this->pdoStatement = $this->pdo->query('SELECT * FROM books ORDER BY titre');

            $books = [];

            while ($book = $this->pdoStatement->fetchObject('Classes\Book')) {
                $books[] = $book;
            }
            
            return $books;

        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function update($book) {
        try {
            $this->pdoStatement = $this->pdo->prepare('UPDATE books SET titre=?, parution=?, description=?, 
                                                        auteur=?, genre=?, statut=?
                                                        WHERE id = :id');
            $this->pdoStatement->bindValue(1,$book->getTitre(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(2,$book->getParution(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(3,$book->getDescription(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(4,$book->getAuteur(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(5,$book->getGenre(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(6,$book->getStatut(), PDO::PARAM_INT);
            $this->pdoStatement->bindValue(':id',$book->getId(), PDO::PARAM_INT);

            return $exeOk = $this->pdoStatement->execute();
        
        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function delete($book) {
        try {
            $this->pdoStatement = $this->pdo->prepare('DELETE FROM books WHERE id = :id');
            $this->pdoStatement->bindValue(':id',$book);

            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la l\'effacement';
        }      
    }

    public function emprunt($id) {
        try {
            $this->pdoStatement = $this->pdo->prepare("UPDATE books SET statut = ? WHERE id = $id ");
            $this->pdoStatement->bindValue(1, 0);
        
            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function retour($id) {
        try {
            $this->pdoStatement = $this->pdo->prepare("UPDATE books SET statut = ? WHERE id = $id ");
            $this->pdoStatement->bindValue(1, 1);
            
            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function search($search) {
        try {
            $sql = "SELECT * FROM books WHERE titre LIKE '$search' ";
            $this->pdoStatement = $this->pdo->prepare($sql);
            
            $success = $this->pdoStatement->execute();
            
            if ($success) {
                foreach ($this->pdo->query($sql, PDO::FETCH_ASSOC)as $titre) {  ?> 
                    <a href="../Vues/BookInfosEmploye.php?id= <?= $titre['id'] ?>"><?php echo $titre['titre'] .'<br>' ?></a>
                    <?php
                }
            } 
        } catch (PDOException $e) {
            echo 'echec de la recherche';
        }             
    }
}
