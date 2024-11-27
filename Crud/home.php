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
              <h4>Lista de Usuários
                <a href="usuarios-create.php" class="btn btn-primary float-end">Adicionar Usuários</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  // Verifica se a conexão está estabelecida
                  if (isset($conex)) {
                      $sql = "SELECT * FROM usuarios";
                      $usuarios = mysqli_query($conex, $sql);

                      if ($usuarios && mysqli_num_rows($usuarios) > 0) {
                          foreach ($usuarios as $usuario) { 
                  ?>
                  <tr>
                    <td><?= $usuario['idusuarios'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['cpf'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['ende'] ?></td>
                    <td><?= date('d/m/Y', strtotime($usuario['data_nasc'])) ?></td>
                    <td>
                      <a href="usuario-view.php?id=<?= $usuario['idusuarios'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                      <a href="usuario-edit.php?id=<?= $usuario['idusuarios'] ?>" class="btn btn-success btn-sm">Editar</a>
                      <form action="acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?= $usuario['idusuarios'] ?>" class="btn btn-danger btn-sm">Excluir</button>
                      </form>
                    </td>
                  </tr>
                  <?php 
                          }
                      } else {
                          echo '<tr><td colspan="7" class="text-center">Nenhum usuário encontrado</td></tr>';
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
