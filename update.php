<?php
    include "connexion.php";
    $update = new ma_connexion("localhost", "app_organisation_contacts", "root", "");

    if(isset($_POST['id'])){

        $up = $update -> update($_POST['id'],$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['age']);

        header("Location: index.php");
        exit();
    }

?>