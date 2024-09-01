<?php
session_start();
if (empty($_SESSION['email'])) {
   header("Location: index.php");
   exit();
}
?>
<!doctype html>
<html lang="pt-br">

<head>
   <title>Cadastro de Clientes</title>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

   <!-- Bootstrap CSS v5.3.2 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
   <style>
      body {
         background-color: #f4f7fa;
      }

      .container {
         background: #fff;
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }

      .modal-content {
         border-radius: 10px;
      }

      .form-label {
         font-weight: 500;
      }

      .btn-primary, .btn-success {
         font-weight: 600;
      }

      .btn-yellow {
         background-color: #ffc107;
         color: #000;
         border: none;
      }

      .btn-yellow:hover {
         background-color: #e0a800;
      }

      .btn-close {
         padding: 1rem;
         margin: -1rem -1rem -1rem auto;
      }

      #btnIncluirCliente {
         font-size: 14px;
         padding: 10px 20px;
      }

      .text-center {
         margin-bottom: 20px;
      }
   </style>
</head>

<body>
   <header>
      <!-- place navbar here -->
   </header>
   <main class="container mt-5">
      <h1 class="text-center">Cadastro de Pessoas</h1>
      
      <form id="frmBuscaCliente" class="d-flex mb-4">
         <input type="text" class="form-control me-2" id="expressaoBusca" placeholder="Busca cliente">
         <button id="btnBusca" type="button" class="btn btn-primary me-2">Buscar Cliente</button>
         <button type="button" id="btnLimpar" onclick="limparBusca()" class="btn btn-secondary">Limpar</button>
      </form>

      <div id="content"></div>

      <!-- Modal para Incluir Cliente -->
      <div class="modal fade" id="modalIncluirCliente" tabindex="-1" aria-labelledby="modalIncluirClienteLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalIncluirClienteLabel">Novo Cliente</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="frmIncluirCliente">
                     <div class="mb-3">
                        <label for="inNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="inNome" required>
                     </div>
                     <div class="mb-3">
                        <label for="inEmail" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="inEmail" required>
                     </div>
                     <div class="mb-3">
                        <label for="inUf" class="form-label">UF</label>
                        <select name="id_uf" id="inUf" class="form-select" required></select>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="button" id="btnIncluir" class="btn btn-success">Salvar</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal para Alterar Cliente -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modificar dados do cliente</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="frmAlterarCliente">
                     <div class="mb-3">
                        <label for="uCodigo" class="form-label">Código</label>
                        <input type="number" class="form-control" name="id_cliente" id="uCodigo" readonly>
                     </div>
                     <div class="mb-3">
                        <label for="uNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="uNome" required>
                     </div>
                     <div class="mb-3">
                        <label for="uEmail" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="uEmail" required>
                     </div>
                     <div class="mb-3">
                        <label for="uUf" class="form-label">UF</label>
                        <select name="id_uf" id="uUf" class="form-select" required></select>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="button" id="btnAtualizar" class="btn btn-warning">Salvar Alterações</button>
               </div>
            </div>
         </div>
      </div>

      <button id="btnIncluirCliente" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#modalIncluirCliente">Novo Cliente</button>
   </main>

   <footer class="mt-5">
      <!-- place footer here -->
   </footer>

   <!-- Bootstrap JavaScript Libraries -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/756fe0e0f0.js" crossorigin="anonymous"></script>
   <script src="js/busca-clientes.js"></script>
</body>
</html>