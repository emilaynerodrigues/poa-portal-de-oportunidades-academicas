<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <!-- links css -->
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/home.css" />

    <!-- link favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />

    <!-- link font symbols -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<div id="myModal" class="modal">
    <div class="modal-content">
        <!-- icon para fechar o modal -->
        <span class="close material-symbols-outlined" onclick="fecharModal()"> close </span>

        <div class="head-projeto">
            <div class="user-icon"></div>
            <div class="projeto-info">
                <!-- titulo do projeto -->
                <h3 id="titulo-projeto" class="titulo-projeto"></h3>
                <p class="info-adicional">por
                    <!-- nome do autor  -->
                    <span id="autor-projeto" class="anunciante">

                    </span>
                    em
                    <!-- categoria -->
                    <span id="categoria-projeto" class="tag categoria">
                    </span>
                </p>
            </div>
        </div>

        <div class="tags-projeto">
            <!-- formato de trabalho (remoto ou presencial) -->
            <span id="formato-projeto" class="tag formato">
            </span>

            <!-- categoria -->
            <span class="tag categoria">
            </span>

            <!-- valor -->
            <span id="valor-projeto" class="tag valor">
            </span>
        </div>

        <!-- parágrafo para exibir a descrição do projeto -->
        <p id="descricao-projeto" class="descricao-texto"> </p>

        <div class="btn-wrapper">
            <div class="btn normal-btn outline-btn">Candidatos inscritos</div>
            <div class="btn small-btn delete-btn">Excluir projeto</div>
            <div class="btn small-btn">Alterar dados</div>
        </div>
    </div>
</div>