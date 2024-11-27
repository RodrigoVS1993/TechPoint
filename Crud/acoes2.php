<?php 
session_start();
require 'conex.php';

// Criação de usuário2
if (isset($_POST['create_usuario2'])) {
    $nome_prod = mysqli_real_escape_string($conex, trim($_POST['nome_prod']));
    $marca = mysqli_real_escape_string($conex, trim($_POST['marca']));
    $quantidade = mysqli_real_escape_string($conex, trim($_POST['quantidade']));
    $preco = mysqli_real_escape_string($conex, trim($_POST['preco']));
    $fornecedor = mysqli_real_escape_string($conex, trim($_POST['fornecedor']));

    $sql = "INSERT INTO produto (nome_prod, marca, quantidade, preco, fornecedor) 
            VALUES ('$nome_prod', '$marca', '$quantidade', '$preco', '$fornecedor')";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Produto criado com sucesso";
        header('Location: home2.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao criar usuário: " . mysqli_error($conex);
        header('Location: home2.php');
        exit;
    }
}


if (isset($_POST['update_usuario2'])) {
    require 'conex.php';

    $idproduto = mysqli_real_escape_string($conex, $_POST['produto_id']);
    $nome_prod = mysqli_real_escape_string($conex, trim($_POST['nome_prod']));
    $marca = mysqli_real_escape_string($conex, trim($_POST['marca']));
    $quantidade = mysqli_real_escape_string($conex, trim($_POST['quantidade']));
    $preco = mysqli_real_escape_string($conex, trim($_POST['Preco']));
    $fornecedor = mysqli_real_escape_string($conex, trim($_POST['fornecedor']));

    // Validação adicional: Certifique-se de que o Preço não está vazio
    if ($preco === '' || !is_numeric($preco)) {
        $_SESSION['mensagem'] = "Erro: O campo Preço é obrigatório e deve ser numérico.";
        header("Location: usuario-edit2.php?id=$idproduto");
        exit;
    }

    // Consulta SQL para atualizar os dados
    $sql = "UPDATE produto 
            SET nome_prod = '$nome_prod', 
                marca = '$marca', 
                quantidade = '$quantidade', 
                Preco = '$preco', 
                fornecedor = '$fornecedor'
            WHERE idproduto = '$idproduto'";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Produto atualizado com sucesso!";
        header('Location: home2.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar Produto: " . mysqli_error($conex);
        header("Location: usuario-edit2.php?id=$idproduto");
        exit;
    }
}




// Deleção de usuário
if (isset($_POST['delete_produto'])) {
    $produto_id = mysqli_real_escape_string($conex, $_POST['delete_produto']);
    $sql = "DELETE FROM produto WHERE idproduto = '$produto_id'";

    if (mysqli_query($conex, $sql)) {
        $_SESSION['mensagem'] = "Produto deletado com sucesso";
        header('Location: home2.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar usuário: " . mysqli_error($conex);
        header('Location: home2.php');
        exit;
    }
}


?>





?>