<?php
    require_once("Database.php");

    $database = new Database();
    $con = $database ->connect();



    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $sql = "SELECT id, login FROM usuario WHERE login = :login AND senha = :senha";

    $st = $con->prepare($sql);
    $st->bindParam(':login', $login);
    $st->bindParam(':senha', $senha);
    $retorno = $st->execute();
    $dados = $st->fetchAll();
    
    if (sizeof($dados) == 1){
        header("location: principal.php");
    }
    else{
        echo "OPS!! Usuário/senha Inválidos";
    }

    
?>
