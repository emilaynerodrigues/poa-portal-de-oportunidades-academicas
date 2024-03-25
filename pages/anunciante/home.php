<?php
// Incluir o arquivo de conexão com o banco de dados
include("../../php/conexao.php");
$conn = conectar();

// Lógica de paginação
$limite_result = 6; // Definir a quantidade de projetos por página
$pagina_atual = isset($_GET['page']) ? $_GET['page'] : 1; // Obter a página atual da URL

$inicio = ($pagina_atual - 1) * $limite_result; // Calcular o início da seleção de registros

// Consulta para obter os projetos de acordo com a paginação --> ordenando pela data de postagem
$stmt = $conn->prepare("SELECT * FROM projeto ORDER BY dataPostagem DESC LIMIT $inicio, $limite_result");
$stmt->execute();
$projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <!-- links css -->
  <link rel="stylesheet" href="../../styles/main.css" />
  <link rel="stylesheet" href="../../styles/home.css" />

  <!-- link favicon -->
  <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon" />

  <!-- link font symbols -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <!-- menu lateral -->
  <aside class="sidebar">
    <!-- Ícone de hambúrguer -->
    <div class="toggle-container">
      <label for="menuToggle" id="menuIcon">&#9776;</label>
      <input type="checkbox" id="menuToggle" />
    </div>

    <!-- Opções do menu -->
    <ul id="menuOptions">
      <!-- menu inicial -->
      <li>
        <a href="#menu-inicial" id="menu-inicial-link"><span class="tooltip">Menu Inicial</span>
          <span class="material-symbols-outlined"> home </span>
          <span class="menu-item-label">Menu Inicial</span>
        </a>
      </li>

      <!-- dados do anuciante -->
      <li>
        <a href="#dados-anuciante">
          <span class="tooltip">Dados do anuciante</span>
          <span class="material-symbols-outlined"> frame_person </span>
          <span class="menu-item-label">Dados do anuciante</span>
        </a>
      </li>

      <!-- configurações -->
      <li>
        <a href="#configuracoes" id="configuracoes-link">
          <span class="tooltip">Configurações</span>
          <span class="material-symbols-outlined"> settings </span>
          <span class="menu-item-label">Configurações</span>
        </a>
      </li>
    </ul>
  </aside>

  <div class="container">
    <header class="header">
      <div class="logo">
        <img src="../../img/logo-escura.png" alt="" srcset="" style="height: 50px" />
      </div>
    </header>

    <main class="content-wrapper">
      <!-- seção do menu inicial -->
      <section class="content" id="menu-inicial">
        <h4>Meus projetos publicados</h4>

        <!-- area dos projetos -->
        <div class="projetos-wrapper">
          <!-- vazendo varredura de cada projeto no banco -->
          <?php foreach ($projetos as $projeto) : ?>
            <!-- fazendo chamada do elemento projeto-anunciante.php -->
            <?php include("../../components/projeto-anunciante.php"); ?>
          <?php endforeach; ?>
        </div>

        <!-- paginação -->
        <div class="pagination">
          <?php
          // Consulta para contar o total de projetos
          $total_projetos = $conn->query("SELECT COUNT(*) AS total FROM projeto")->fetch(PDO::FETCH_ASSOC);
          $total_paginas = ceil($total_projetos['total'] / $limite_result);

          // Botão Voltar
          if ($pagina_atual > 1) {
            echo "<a href='home.php?page=" . ($pagina_atual - 1) . "' class='pagination-btn'>Voltar
              <span class='icon material-symbols-outlined'>chevron_left</span></a>";
          }

          echo "<p>-</p>";
          
          // Botão Avançar
          if ($pagina_atual < $total_paginas) {
            echo "<a href='home.php?page=" . ($pagina_atual + 1) . "' class='pagination-btn'>
              <span class='icon material-symbols-outlined'> navigate_next </span>Próxima</a>";
          }
          ?>
        </div>

        <a href="adicionar-projeto.php" class="add-btn">
          <span class="material-symbols-outlined"> add </span>
        </a>
      </section>

      <!-- seção dados-pessoais -->
      <section class="content" id="dados-anuciante">dados do anuciante</section class="content">

      <!-- seção configuracoes -->
      <section class="content" id="configuracoes">configurações</section class="content">
    </main>
  </div>

  <script src="../../js/main.js"></script>
</body>

</html>