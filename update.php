<?php
    include "connexion.php";

    if(isset($_POST['id'])){

        $up = $connexion -> update($_POST['id'],$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['age']);

        header("Location: index.php");
        exit();
    }

?>