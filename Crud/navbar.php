<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <!-- "TechPoint" como botão -->
        <button class="btn btn-outline-light" onclick="navigateToPage('home.php')">TechPoint</button>

        <div class="d-flex">
            <button class="btn btn-outline-light me-2" onclick="navigateToPage('home2.php')">Produtos</button>
            <button class="btn btn-outline-light me-2" onclick="navigateToPage('home3.php')">Clientes</button>
            <button class="btn btn-outline-light" onclick="logout()">Sair</button>
        </div>
    </div>
</nav>

<script>
    // Função para redirecionar para outra página
    function navigateToPage(page) {
        // Redireciona para a página recebida como argumento
        window.location.href = page;
    }

    // Função para o botão de "Sair"
    function logout() {
        // Redirecionar para a página de logout
        window.location.href = 'index.php';
    }
</script>
