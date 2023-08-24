<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// echo $name;
// echo $email;
// exit;

if($name && $email){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() === 0){
        // PDO STATEMENT, montando aos poucos a query
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)"); // montou o template
        $sql->bindValue(':name', $name); // associou com parâmetro. normall/e vai usar esse
        $sql->bindParam(':email', $email); // associou com variável
        $sql->execute();
    
        header("Location: index.php");
        exit;
    } else {
        header("Location: adicionar.php");
        exit;
    }

} else {
    header("Location: adicionar.php");
}