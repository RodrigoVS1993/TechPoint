<?php 
session_start();
require 'conex.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Usuario-editar</title>
  </head>
  <body>
    <?php include ("navbar.php"); ?>
   <div class="container mt-5" >
    <div class="row">
    <div class="col-md-12" >
    <div class="card" >
    <div class="card-header">
    <h4>Editar produto
    <a href="home2.php" class="btn btn-danger float-end">Voltar</a>
    </h4>
    </div>
    <div class="card body">
       <?php 
       if (isset($_GET['id'])){
        $produto_id = mysqli_real_escape_string($conex, $_GET['id']);
        $sql = "SELECT * FROM produto WHERE idproduto = '$produto_id'"; 
        $query = mysqli_query ($conex, $sql);

        if (mysqli_num_rows($query) > 0) {
            $produto = mysqli_fetch_array($query);
       ?> 
    <form action="acoes2.php" method="POST">
        <input type="hidden" name="produto_id"   value="<?=$produto['idproduto']?>">
    <div class="mb-3">
    <label>Nome do produto</label>
    <input type="text" name="nome_prod" value="<?=$produto['nome_prod']?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>Marca</label>
    <input type="text" name="marca" value="<?=$produto['marca']?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>Quantidade</label>
    <input type="text" name="quantidade" value="<?=$produto['quantidade']?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>Preço</label>
    <input type="text" name="Preco" 
           value="<?= htmlspecialchars($produto['Preco'] ?? '', ENT_QUOTES, 'UTF-8') ?>" 
           class="form-control">
    </div>
    <div class="mb-3">
    <label>Fornecedor</label>
    <input type="text" name="fornecedor" value="<?=$produto['fornecedor']?>" class="form-control">
    </div>
    <div class="mb-3">
<button type="submit" name="update_usuario2" class="btn btn-primary">Salvar</button>
    </div>
    </form>
    <?php 
       } else{
        echo"<h5> Prodruto não encontrado<h5>";
       }
    }
    ?>


    </div>
    </div>
    </div>
    </div>
   </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>