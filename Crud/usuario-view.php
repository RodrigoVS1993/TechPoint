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

    <title>P - Vizualizar</title>
  </head>
  <body>
    <?php include ("navbar.php"); ?>
   <div class="container mt-5" >
    <div class="row">
    <div class="col-md-12" >
    <div class="card" >
    <div class="card-header">
    <h4>Vizualizar usuario
    <a href="home.php" class="btn btn-danger float-end">Voltar</a>
    </h4>
    </div>
    <div class="card body">
        <?php 
        if (isset($_GET['id'])){
          $usuario_id = mysqli_real_escape_string($conex , $_GET['id']);
          $sql = "SELECT * FROM usuarios where idusuarios= '$usuario_id'";
          $query = mysqli_query($conex, $sql);

          if (mysqli_num_rows($query) > 0 ){
            $usuario = mysqli_fetch_array($query);
          }

        ?>
 
    <div class="mb-3">
    <label>Nome</label>
    <p class="form-control" >
      <?=$usuario['nome'];?>
    </p>
  
    </div>

    <div class="mb-3">
    <label>CPF</label>
    <p class="form-control" >
      <?=$usuario['cpf'];?>
    </p>
  
    </div>

    <div class="mb-3">
    <label>Email</label>
    <p class="form-control" >
    <?=$usuario['email'];?>
    </p>

    <div class="mb-3">
    <label>Endereço</label>
    <p class="form-control" >
    <?=$usuario['ende'];?>
    </p>


    </div>
    <div class="mb-3">
    <label>Data de Nascimento</label>
    <p class="form-control" >
    <?=date('d/m/Y', strtotime( $usuario['data_nasc']));?>
    </p>
    </div>
    <?php
        } else {
          echo "<h5>Usuário não encontrado</h5>";
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