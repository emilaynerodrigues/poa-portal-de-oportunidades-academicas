<!-- informações do projeto -->
<div class="projeto" data-categoria="<?php echo $projeto['categoria'] ?>">
    <div class="head-projeto">
        <div class="user-icon"></div>
        <div class="projeto-info">
            <h3 class="titulo-projeto"><?php echo $projeto['titulo']; ?></h3>
            <p class="info-adicional">postado em
                <span>
                    <?php
                    // formatando a data de postagem
                    $timestamp = strtotime($projeto['dataPostagem']);
                    $dataFormatada = date('d/m/Y', $timestamp);
                    echo $dataFormatada;
                    ?>
                </span>
                por <span class="anunciante" style="text-transform: capitalize;">
                    <?php
                    echo $projeto['nome_anunciante'];
                    ?>
                </span>
            </p>
        </div>
    </div>
    <div class="tags-projeto">
        <span style="text-transform: capitalize;" class="tag formato"><?php echo $projeto['formato']; ?></span>
        <span class="tag categoria"><?php echo $projeto['categoria']; ?></span>
        <span class="tag valor"><?php echo 'R$ ' . $projeto['valor']; ?></span>
    </div>
    <div class="descricao-projeto">
        <p class="descricao-texto"><?php echo $projeto['descricao']; ?></p>
    </div>
    <!-- Botão para abrir o modal -->
    <a href="#" onclick="abrirModal(this)" class="verMais" data-id="<?php echo $projeto['id']; ?>" data-titulo="<?php echo $projeto['titulo']; ?>" data-categoria="<?php echo $projeto['categoria']; ?>" data-formato="<?php echo $projeto['formato']; ?>" data-valor="<?php echo $projeto['valor']; ?>" data-descricao="<?php echo $projeto['descricao']; ?>">Ver mais</a>
</div>

<!-- modal com todas as informações do projeto + opção de se candidatar -->
<div id="projectModal" class="modal modal-confirm">
    <div class="modal-content">
        <!-- Icon para fechar o modal -->
        <span class="close-icon material-symbols-outlined" id="closeIcon"> close </span>

        <div class="head-projeto">
            <div class="user-icon"></div>
            <div class="projeto-info">
                <!-- Título do projeto -->
                <h3 id="titulo-projeto" class="titulo-projeto"></h3>
                <p class="info-adicional">por <span style="text-transform: capitalize;" class="anunciante"><?php echo $projeto['nome_anunciante']; ?></span>
                    <!-- Nome do autor -->
                    <span id="autor-projeto" class="anunciante"></span>
                </p>
            </div>
        </div>

        <div class="tags-projeto">
            <!-- Formato de trabalho (remoto ou presencial) -->
            <span style="text-transform: capitalize;" id="formato-projeto" class="tag formato"></span>

            <!-- Categoria -->
            <span id="categoria-projeto" class="tag categoria"></span>

            <!-- Valor -->
            <span id="valor-projeto" class="tag valor"></span>
        </div>

        <!-- Parágrafo para exibir a descrição do projeto -->
        <p id="descricao-projeto" class="descricao-texto"></p>

        <div class="btn-wrapper btn-candidatar">
            <a href="#" onclick="abrirModalCandidatar(this)" data-id="<?php echo $projeto['id']; ?>" class="btn small-btn">Me candidatar</a>
        </div>
    </div>
</div>

<!-- modal de confirmação de candidatura -->
<div id="modalCandidatar" class="modal modal-delete">
    <div class="modal-content">
        <a href="#" class="closeIconCandidatar"><span class="modal-close close-icon material-symbols-outlined"> close </span></a>
        <span class="icon material-symbols-outlined"> help </span>
        <h3>Deseja se candidatar?</h3>
        <p>Parece que você se interessou no projeto. Tem certeza que deseja se candidatar?</p>
        <div class="btn-wrapper">
            <a href="#" class="btn small-btn cancel-btn modal-close closeIconCandidatar">Cancelar</a>
            <a href="#" id="confirmCandidatura" data-id="<?php echo $projeto['id'] ?>" class="btn small-btn">Candidatar</a>
        </div>
    </div>
</div>

<script>
    // função para abrir o modal e exibir a descrição do projeto
    function abrirModal(link) {
        var modal = document.getElementById("projectModal");
        var tituloProjeto = document.getElementById("titulo-projeto");
        var categoriaProjeto = document.getElementById("categoria-projeto");
        var formatoProjeto = document.getElementById("formato-projeto");
        var valorProjeto = document.getElementById("valor-projeto");
        var descricaoProjeto = document.getElementById("descricao-projeto");
        currentProjectId = link.getAttribute("data-id"); // Obtendo o ID do projeto a partir do link


        // obtendo os dados do projeto do atributo de dados do link
        var titulo = link.getAttribute("data-titulo");
        var categoria = link.getAttribute("data-categoria");
        var formato = link.getAttribute("data-formato");
        var valor = link.getAttribute("data-valor");
        var descricao = link.getAttribute("data-descricao");

        // atualizando o conteúdo do modal com os dados do projeto
        tituloProjeto.textContent = titulo;
        categoriaProjeto.textContent = categoria;
        formatoProjeto.textContent = formato;
        valorProjeto.textContent = "R$ " + valor;
        descricaoProjeto.textContent = descricao;
        // abrindo o modal
        modal.style.display = "flex";
    }

    // função para fechar o modal do projeto
    function fecharModal() {
        var modal = document.getElementById("projectModal");
        modal.style.display = "none";
    }

    // atribuindo evento de clique ao ícone de fechamento
    var closeIcon = document.getElementById("closeIcon");
    if (closeIcon) {
        closeIcon.addEventListener("click", fecharModal);
    }

    // função para abrir o modal de confirmação de exclusão
    function abrirModalCandidatar(link) {
        var modal = document.getElementById("modalCandidatar");
        var modalProjeto = document.getElementById("projectModal");
        // fechando modal dos projetos
        modalProjeto.style.display = "none";
        
        var confirmCandidatura = document.getElementById("confirmCandidatura");
        // currentProjectId = link.getAttribute("data-id"); // Obtendo o ID do projeto a partir do link
        
        // console.log("ID do Projeto:", currentProjectId); // Adicionando console.log para verificar o ID do projeto
        // Configurando o link de exclusão com o ID correto do projeto
        confirmCandidatura.href = "../../php/aluno/script_candidatarProjeto.php?id=" + currentProjectId;


        // Abrindo o modal de confirmação de exclusão
        modal.style.display = "flex";
    }

    // função para fechar o modal de candidatura
    function fecharModalCandidatar() {
        var modal = document.getElementById("modalCandidatar");
        var modalProjeto = document.getElementById("projectModal");

        modal.style.display = "none"; //fechando modal de candidatura
        modalProjeto.style.display = "flex"; //mostrando de volta o modal do projeto
    }

    // atribuindo evento de clique ao ícone de fechamento
    var closeIconCandidatar = document.querySelectorAll(".closeIconCandidatar");
    closeIconCandidatar.forEach(function(closeIconCandidatar) {
        // Adicionando um event listener para o evento de clique em cada closeIcon
        closeIconCandidatar.addEventListener("click", fecharModalCandidatar);
    });
</script>