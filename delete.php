<?php
    include "connexion.php";
    if(isset($_POST['id'])){
        
        $del = $connexion -> delete($_POST['id']);

    header("Location: index.php");
    exit();
    }
    
?>