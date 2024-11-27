<?php
session_start();
require "conex.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lista de Usuários</title>
  </head>
  <body>
    <?php include("navbar.php"); ?>

    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Lista de Produtos
                <a href="usuario-create2.php" class="btn btn-primary float-end">Adicionar Usuários</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome do produto</th>
                    <th>Marca</th>
                    <th>Quantidade em estoque</th>
                    <th>Preço</th>
                    <th>Fornecedor</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  // Verifica se a conexão está estabelecida
                  if (isset($conex)) {
                      $sql = "SELECT * FROM produto";
                      $resultado = mysqli_query($conex, $sql);

                      if ($resultado && mysqli_num_rows($resultado) > 0) {
                          while ($produto = mysqli_fetch_assoc($resultado)) { 
                  ?>
                  <tr>
                    <td><?= $produto['idproduto'] ?></td>
                    <td><?= $produto['nome_prod'] ?></td>
                    <td><?= $produto['marca'] ?></td>
                    <td><?= $produto['quantidade'] ?></td>
                    <td><?= $produto['preco'] ?></td>
                    <td><?= $produto['fornecedor'] ?></td>
                    <td>
                      <a href="usuario-view2.php?id=<?= $produto['idproduto'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                      <a href="usuario-edit2.php?id=<?= $produto['idproduto'] ?>" class="btn btn-success btn-sm">Editar</a>
                      <form action="acoes2.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_produto" value="<?= $produto['idproduto'] ?>" class="btn btn-danger btn-sm">Excluir</button>
                      </form>
                    </td>
                  </tr>
                  <?php 
                          }
                      } else {
                          echo '<tr><td colspan="7" class="text-center">Nenhum produto encontrado</td></tr>';
                      }
                  } else {
                      echo '<tr><td colspan="7" class="text-center">Erro de conexão com o banco de dados</td></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
