<?php 
session_start();
require 'conex.php';

// Criação de usuário
if (isset($_POST['create_usuario'])) {
    $nome = mysqli_real_escape_string($conex, trim($_POST['nome']));
    $cpf = mysqli_real_escape_string($conex, trim($_POST['cpf']));
    $email = mysqli_real_escape_string($conex, trim($_POST['email']));
    $ende = mysqli_real_escape_string($conex, trim($_POST['ende']));
    $data_nasc = mysqli_real_escape_string($conex, trim($_POST['data_nasc']));
    $senha = isset($_POST['senha']) ? password_hash(trim($_POST['senha']), PASSWORD_DEFAULT) : "";

    $sql = "INSERT INTO usuarios (nome, cpf, email, ende, data_nasc, senha) 
            VALUES ('$nome', '$cpf', '$email', '$ende', '$data_nasc', '$senha')";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Usuário criado com sucesso";
        header('Location: home.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao criar usuário: " . mysqli_error($conex);
        header('Location: home.php');
        exit;
    }
}

// Atualização de usuário
if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conex, $_POST['usuario_id']);
    $nome = mysqli_real_escape_string($conex, trim($_POST['nome']));
    $cpf = mysqli_real_escape_string($conex, trim($_POST['cpf']));
    $email = mysqli_real_escape_string($conex, trim($_POST['email']));
    $ende = mysqli_real_escape_string($conex, trim($_POST['ende']));
    $data_nasc = mysqli_real_escape_string($conex, trim($_POST['data_nasc']));
    $senha = trim($_POST['senha']);

    // Consulta SQL inicial
    $sql = "UPDATE usuarios 
            SET nome = '$nome', cpf = '$cpf', email = '$email', 
                ende = '$ende', data_nasc = '$data_nasc'";

    // Atualizar senha apenas se foi fornecida
    if (!empty($senha)) {
        $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
        $sql .= ", senha = '$hashed_password'";
    }

    $sql .= " WHERE idusuarios = '$usuario_id'";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Usuário atualizado com sucesso";
        header('Location: home.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar usuário: " . mysqli_error($conex);
        header('Location: home.php');
        exit;
    }
}

// Deleção de usuário
if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conex, $_POST['delete_usuario']);
    $sql = "DELETE FROM usuarios WHERE idusuarios = '$usuario_id'";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Usuário deletado com sucesso";
        header('Location: home.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar usuário: " . mysqli_error($conex);
        header('Location: home.php');
        exit;
    }
}




