<?php


class ma_connexion{

    private $host;
    private $nom_bd;
    private $user;
    private $password;
    private $connexionPDO;

    public function __construct($host, $nom_bd, $user, $password)
    {
        $this -> host = $host;
        $this -> nom_bd = $nom_bd;
        $this -> user = $user;
        $this -> password = $password;

        try {

            $dsn = "mysql:host=" . $this-> host . "; dbname=" . $this-> nom_bd . "; charset:=utf8mb4_0900_ai_ci";
            $this-> connexionPDO = new PDO($dsn, $this-> user, $this-> password);
            $this-> connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "<style> body{background-color: lightcyan; color: darkbrown;} </style>";
            // echo "connexion réussi" . "<br>" ."↜(╰ •ω•)╯!" . "<br>";

        } catch (PDOException $e) {

            echo "connexion pas marché!" . "<br>" ."(╥╯⌒╰╥๑)" . "<br>";
            echo "<style> body{background-color: #FB4640; color: white;} </style>";
            echo "Erreur : " . $e->getMessage();

        }
    }

    // SECLECT
    public function select( $colonne, $table){
        try {

            $select = "SELECT $colonne FROM $table";

            $requete = $this -> connexionPDO -> prepare($select);
            $requete -> execute();
            $afficher = $requete -> fetchAll(PDO::FETCH_ASSOC);

            return $afficher;

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

        }
    }



    // INSERTION 
    public function insert($nom, $prenom, $email , $age){ 

            try {

                $insert = "INSERT INTO  `contacts`(nom, prenom, email , age)  VALUES (?, ?, ?, ?)";
    
                $requete = $this -> connexionPDO -> prepare($insert);
                $requete->bindValue(1, $nom, PDO::PARAM_STR);
                $requete->bindValue(2, $prenom, PDO::PARAM_STR);
                $requete->bindValue(3, $email, PDO::PARAM_STR);
                $requete->bindValue(4, $age, PDO::PARAM_INT);
    
            
                $requete->execute();
    
            } catch (PDOException $e) {
    
                echo "Erreur : " . $e->getMessage();
    
            }
    }

    // UPDATE 
    public function update($id, $nom, $prenom, $email , $age) {

        try {
            $update = "UPDATE `contacts` SET nom = ?, prenom = ?, email = ?, age = ? WHERE `id_contacts` = ?";
    
            $requete = $this->connexionPDO->prepare($update);
            $requete->bindValue(1, $nom, PDO::PARAM_STR);
            $requete->bindValue(2, $prenom, PDO::PARAM_STR);
            $requete->bindValue(3, $email, PDO::PARAM_STR);
            $requete->bindValue(4, $age, PDO::PARAM_INT);
            $requete->bindValue(5, $id, PDO::PARAM_INT);
    
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }


    // DELETE
    public function delete($id) {

        try {
            $delete = "DELETE FROM `contacts` WHERE `id_contacts` = ?";
    
            $requete = $this->connexionPDO->prepare($delete);
            $requete->bindValue(1, $id);

            $requete->execute();

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    
    
}     
 

        



// $connexion = new ma_connexion("localhost", "app_organisation_contacts", "root", "");
// $test -> update_salle("2023-12-23", "2023-11-23", "1");
// $users = $test -> select("*","users");

// var_dump($articles = $test -> select("*","articles"));
 //$test -> insert_articles("titre", "resume", "titre_2" , "contenu", "titre_3", "contenu_2", "photo", "1960-08-14", "oof");
// $test -> delete_client("5");

?>




