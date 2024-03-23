<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adicione seu projeto - POA</title>

    <!-- links css -->
    <link rel="stylesheet" href="../../styles/main.css" />
    <link rel="stylesheet" href="../../styles/home.css" />

    <!-- link favicon -->
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon" />

    <!-- link font symbols -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    <?php include '../../components/projeto.php'; ?>
                </div>

                <a href="adicionar-projeto.php" class="add-btn">
                    <span class="material-symbols-outlined"> add </span>
                </a>
            </section class="content">

            <!-- seção dados-pessoais -->
            <section class="content" id="dados-anuciante">dados do anuciante</section class="content">

            <!-- seção configuracoes -->
            <section class="content" id="configuracoes">configurações</section class="content">
        </main>
    </div>

    <script src="../../js/main.js"></script>
</body>

</html>