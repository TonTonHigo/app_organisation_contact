<?php
    include "connexion.php";
    $delete = new ma_connexion("localhost", "app_organisation_contacts", "root", "");
    if(isset($_POST['id'])){
        
        $del = $delete -> delete($_POST['id']);

    header("Location: index.php");
    exit();
    }
    
?>