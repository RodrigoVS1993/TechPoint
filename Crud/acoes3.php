<?php 
session_start();
require 'conex.php';

// Criação de usuário2
if (isset($_POST['create_usuario3'])) {
    $nome_clien = mysqli_real_escape_string($conex, trim($_POST['nome_clien']));
    $email = mysqli_real_escape_string($conex, trim($_POST['email']));
    $cpf = mysqli_real_escape_string($conex, trim($_POST['cpf']));
    $endere = mysqli_real_escape_string($conex, trim($_POST['endere']));
    $telefone = mysqli_real_escape_string($conex, trim($_POST['telefone']));

    $sql = "INSERT INTO cliente (nome_clien, email, cpf, endere, telefone) 
            VALUES ('$nome_clien', '$email', '$cpf', '$endere', '$telefone')";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Cliente criado com sucesso";
        header('Location: home3.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao criar usuário: " . mysqli_error($conex);
        header('Location: home3.php');
        exit;
    }
}




if (isset($_POST['update_usuario3'])) {
    $cliente_id = mysqli_real_escape_string($conex, $_POST['cliente_id']);
    $nome_clien = mysqli_real_escape_string($conex, $_POST['nome_clien']);
    $email = mysqli_real_escape_string($conex, $_POST['email']);
    $cpf = mysqli_real_escape_string($conex, $_POST['cpf']);
    $endere = mysqli_real_escape_string($conex, $_POST['endere']);
    $telefone = mysqli_real_escape_string($conex, $_POST['telefone']);

    // Atualizando os dados no banco
    $sql = "UPDATE cliente 
            SET 
                nome_clien = '$nome_clien', 
                email = '$email', 
                cpf = '$cpf', 
                endere = '$endere', 
                telefone = '$telefone' 
            WHERE idcliente = '$cliente_id'";

    $query = mysqli_query($conex, $sql);

    if ($query) {
        $_SESSION['message'] = "Cliente atualizado com sucesso!";
        header("Location: home3.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Erro ao atualizar cliente.";
        header("Location: usuario-editar3.php?id=$cliente_id");
        exit(0);
    }
} else {
    $_SESSION['message'] = "Ação inválida.";
    header("Location: home3.php");
    exit(0);
}



// Deleção de cliente
if (isset($_POST['delete_cliente'])) {
    $cliente = mysqli_real_escape_string($conex, $_POST['delete_cliente']);
    $sql = "DELETE FROM cliente WHERE iducliente = '$cliente_id'";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Cliente deletado com sucesso";
        header('Location: home.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar cliente: " . mysqli_error($conex);
        header('Location: home.php');
        exit;
    }
}


?>




