<?php
// Incluindo a conexão com o banco de dados
require_once '../config/database.php';

// Inicializando a conexão
$database = new Database();
$db = $database->getConnection();

// Consulta para buscar as vagas e seus detalhes
$query = "SELECT v.titulo, e.nome AS empresa, v.descricao 
          FROM vagas v 
          JOIN empresas e ON v.empresa_id = e.id";
$stmt = $db->prepare($query);
$stmt->execute();
$vagas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Vagas - Aruja Guia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Aruja Guia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="https://www.prefeituradearuja.sp.gov.br/">Prefeitura</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.arujatransporte.com.br/">Transporte</a></li>
                    <li class="nav-item"><a class="nav-link" href="./view/empresas.html">Empresas</a></li>
                    <li class="nav-item"><a class="nav-link" href="./view/buscar.php">Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="./view/sobre.html">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="./view/contato.html">Contato</a></li>
                    <li class="nav-item"><a class="nav-link" href="./view/login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da Página de Busca -->
    <div class="container my-5">
        <h1>Vagas Disponíveis</h1>
        <div class="alert alert-info">Aqui você verá as vagas mais recentes disponíveis.</div>

        <!-- Listando as Vagas do Banco de Dados -->
        <?php if (count($vagas) > 0): ?>
            <?php foreach ($vagas as $vaga): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($vaga['titulo']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($vaga['empresa']) ?></p>
                        <p class="card-text"><?= htmlspecialchars($vaga['descricao']) ?></p>
                        <a href="vaga-detalhes.html?vaga=<?= urlencode($vaga['titulo']) ?>" class="btn btn-primary">Ver detalhes da vaga</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">Nenhuma vaga disponível no momento.</div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
