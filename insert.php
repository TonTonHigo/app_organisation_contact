<?php
    include "connexion.php";

    if(isset($_POST['nom'])){

        $ins = $connexion -> insert($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['age']);

        header("Location: index.php");
        exit();
    }

?>