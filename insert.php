<?php
    include "connexion.php";
    $insert = new ma_connexion("localhost", "app_organisation_contacts", "root", "");

    if(isset($_POST['nom'])){

        $ins = $insert -> insert($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['age']);

        header("Location: index.php");
        exit();
    }

?>