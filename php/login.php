<?php
    session_start();
    require_once("connessione.php");
    $obj_connection = new DBConnection();
    $connected = $obj_connection->create_connection();

    unset($_SESSION);
    $email=$_POST["email"];
    $password=$_POST["password"];

    if(!$log_query=$obj_connection->queryDB("SELECT * FROM utente WHERE Mail='$email' AND PWD='$password'")){
        header('Location: ../html/login.html');
        exit;
    }else{
        $_SESSION["logged"]=true;
        $_SESSION["ID"]=$log_query[0]["ID"];
        $_SESSION["permesso"]=$log_query[0]["Permessi"];
    }

    //Reindirizzamento sulla home
    header('Location: ../html/index.html');
?>