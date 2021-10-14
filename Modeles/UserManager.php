<?php
  
namespace Modeles;

use PDO;
use Modeles\User;


class UserManager {

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

    public function create(User $user) {
        try {
            $this->pdoStatement = $this->pdo->prepare('INSERT INTO utilisateurs (nom,prenom,naissance,email,mdp,adresse,role)
                                                        VALUES (?,?,?,?,?,?,?)');
            $this->pdoStatement->bindValue(1,$user->getNom(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(2,$user->getPrenom(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(3,$user->getDateNaissance(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(4,$user->getEmail(), PDO::PARAM_STR);
            $password = $user->getMdp();
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->pdoStatement->bindValue(5, $password);
            $this->pdoStatement->bindValue(6,$user->getAdresse(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(7, 'En attente');

            return $exeOk = $this->pdoStatement->execute();
         
        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function read($email) {
        try {
            $this->pdoStatement = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
            $this->pdoStatement->bindValue(1,$email, PDO::PARAM_STR);
            $exeOk = $this->pdoStatement->execute();

            if ($exeOk) {
                $user = $this->pdoStatement->fetchObject('Modeles\User');
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function readAll() {
        try {
            $this->pdoStatement = $this->pdo->query('SELECT * FROM utilisateurs ORDER BY nom, prenom');

            $users = [];

            while ($user = $this->pdoStatement->fetchObject('Modeles\User')) {
                $users[] = $user;
            }
            
            return $users;

        } catch (PDOException $e) {
            echo 'echec de la lecture';
        }      
    }

    public function update(User $user) {
        try {
            $this->pdoStatement = $this->pdo->prepare('UPDATE utilisateurs SET nom=?, prenom=?, naissance=?, 
                                                        email=?, mdp=?, adresse=?, role=?
                                                        WHERE id = :id');
            $this->pdoStatement->bindValue(1,$user->getNom(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(2,$user->getPrenom(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(3,$user->getDateNaissance(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(4,$user->getEmail(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(5,$user->getPassword(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(6,$user->getAdresse(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(7,$user->getRole(), PDO::PARAM_INT);
            $this->pdoStatement->bindValue(':id',$user->getId(), PDO::PARAM_INT);

            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function delete(User $user) {
        try {
            $this->pdoStatement = $this->pdo->prepare('DELETE FROM utilisateurs WHERE id = :id');
            $this->pdoStatement->bindValue(':id',$user->getId(), PDO::PARAM_INT);

            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function confirmRole($id) {
        try {

            $this->pdoStatement = $this->pdo->prepare("UPDATE utilisateurs SET role = ? WHERE id = $id ");
            $this->pdoStatement->bindValue(1, $_POST['role']);
            
            return $exeOk = $this->pdoStatement->execute();

        } catch (PDOException $e) {
            echo 'echec de la mise à jour';
        }      
    }

    public function search($search) {
        try {
            $sql = "SELECT * FROM utilisateurs WHERE email LIKE '$search' ";
            $this->pdoStatement = $this->pdo->prepare($sql);
            $this->pdoStatement->execute();
            
            foreach ($this->pdo->query($sql, PDO::FETCH_ASSOC)as $login) {
                session_start();
                $_SESSION['emailToRead'] = $login["email"];
                ?> 
                <a href="../Vues/ReadUserPage.php"><?php echo $login["email"] .'<br>' ?></a>
                <?php 
            }
            
        } catch (PDOException $e) {
            echo 'echec de la recherche';
        }      
    }
}
