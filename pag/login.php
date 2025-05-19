<?php
session_start();
include '../bd/dbcon.php';

// Consultar os produtos
$query = "SELECT produtos.*, produto_imagem.link_imagem, produto_imagem.titulo, produto_imagem.descricao 
          FROM produtos, produto_imagem
          WHERE produto_imagem.id_produto = produtos.id_produto;";
$stmt = $pdo->query($query);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .game-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin: 15px;
            background-color: #fff;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .game-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .game-card h3 {
            font-size: 1.2rem;
            margin-top: 10px;
            flex-grow: 1;
        }

        .game-card .btn-buy {
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .game-card .btn-buy:hover {
            background-color: #0056b3;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Loja de Jogos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Banner -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1>Bem-vindo à Loja de Jogos</h1>
        <p>Encontre os melhores jogos com descontos exclusivos!</p>
    </div>
</header>

<!-- Login -->
<section class="container py-5">
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>
        <form action="check_login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Usuário:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</section>

<!-- Contato -->
<section class="container py-5">
    <h2 class="text-center mb-4">Entre em Contato</h2>
    <form>
        <div class="row">
            <div class="col-md-6">
                <input class="form-control mb-3" type="text" placeholder="Seu Nome" required />
                <input class="form-control mb-3" type="email" placeholder="Seu E-mail" required />
                <input class="form-control mb-3" type="tel" placeholder="Seu Telefone" required />
            </div>
            <div class="col-md-6">
                <textarea class="form-control mb-3" placeholder="Mensagem" rows="5" required></textarea>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit">Enviar Mensagem</button>
        </div>
    </form>
</section>

<!-- Rodapé -->
<footer class="footer text-center">
    <p>&copy; 2025 Loja de Jogos. Todos os direitos reservados.</p>
    <div>
        <a href="#" class="text-white me-3">Privacidade</a>
        <a href="#" class="text-white">Termos de Uso</a>
    </div>
</footer>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
