<?php
//sessao iniciada
session_start();

//conexao com o bd
require_once 'db_connect.php';

//clear (protecao xss e sql)
function clear($input){
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}


if(isset($_POST['btn-editar'])):
    $nome = clear($_POST['nome']); //filtragem
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    $id = clear($_POST['id']);

    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', 
    idade = '$idade' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)): //verificacao se conseguiu inserir corretamente
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../index.php');
    endif;
endif;