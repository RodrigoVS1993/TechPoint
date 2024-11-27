<?php 
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

    <title>Usuario - Vizualizar</title>
  </head>
  <body>
    <?php include ("navbar.php"); ?>
   <div class="container mt-5" >
    <div class="row">
    <div class="col-md-12" >
    <div class="card" >
    <div class="card-header">
    <h4>Vizualizar produto
    <a href="home2.php" class="btn btn-danger float-end">Voltar</a>
    </h4>
    </div>
    <div class="card body">
        <?php 
        if (isset($_GET['id'])){
          $produto_id = mysqli_real_escape_string($conex , $_GET['id']);
          $sql = "SELECT * FROM produto where idproduto= '$produto_id'";
          $query = mysqli_query($conex, $sql);

          if (mysqli_num_rows($query) > 0 ){
            $produto = mysqli_fetch_array($query);
          }

        ?>
 
    <div class="mb-3">
    <label>Nome do produto</label>
    <p class="form-control" >
      <?=$produto['nome_prod'];?>
    </p>
  
    </div>

    <div class="mb-3">
    <label>Marca</label>
    <p class="form-control" >
      <?=$produto['marca'];?>
    </p>
  
    </div>

    <div class="mb-3">
    <label>Quantidade</label>
    <p class="form-control" >
    <?=$produto['quantidade'];?>
    </p>

    <div class="mb-3">
    <label>Preço</label>
    <p class="form-control" >
    <?=$produto['preco'];?>
    </p>


    </div>
    <div class="mb-3">
    <label>Fornecedor</label>
    <p class="form-control" >
    <?=$produto['fornecedor'];?>
    </p>
    </div>
    <?php
        } else {
          echo "<h5>Produto não encontrado</h5>";
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