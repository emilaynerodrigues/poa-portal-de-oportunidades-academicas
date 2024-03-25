<!-- informações do projeto -->
<div class="projeto">
    <div class="head-projeto">
        <div class="user-icon"></div>
        <div class="projeto-info">
            <h3 class="titulo-projeto"><?php echo $projeto['titulo']; ?></h3>
            <p class="info-adicional">postado em <span class="anunciante"><?php echo $projeto['dataPostagem']; ?></span></p>
        </div>
    </div>
    <div class="tags-projeto">
        <span class="tag formato"><?php echo $projeto['formato']; ?></span>
        <span class="tag categoria"><?php echo $projeto['categoria']; ?></span>
        <span class="tag valor"><?php echo 'R$ ' . $projeto['valor']; ?></span>
    </div>
    <div class="descricao-projeto">
        <p class="descricao-texto"><?php echo $projeto['descricao']; ?></p>
    </div>
    <!-- Botão para abrir o modal -->
    <a href="#" onclick="abrirModal(this)" class="verMais" data-id="<?php echo $projeto['id']; ?>" data-titulo="<?php echo $projeto['titulo']; ?>" data-categoria="<?php echo $projeto['categoria']; ?>" data-formato="<?php echo $projeto['formato']; ?>" data-valor="<?php echo $projeto['valor']; ?>" data-descricao="<?php echo $projeto['descricao']; ?>">Ver mais</a>
</div>

<!-- modal com todas as informações do projeto + crud -->
<div id="projectModal" class="modal modal-confirm">
    <div class="modal-content">
        <!-- Icon para fechar o modal -->
        <span class="close-icon material-symbols-outlined" onclick="fecharModal()"> close </span>

        <div class="head-projeto">
            <div class="user-icon"></div>
            <div class="projeto-info">
                <!-- Título do projeto -->
                <h3 id="titulo-projeto" class="titulo-projeto"></h3>
                <p class="info-adicional">por<?php echo $projeto['id']; ?>
                    <!-- Nome do autor -->
                    <span id="autor-projeto" class="anunciante"></span>
                </p>
            </div>
        </div>

        <div class="tags-projeto">
            <!-- Formato de trabalho (remoto ou presencial) -->
            <span id="formato-projeto" class="tag formato"></span>

            <!-- Categoria -->
            <span id="categoria-projeto" class="tag categoria"></span>

            <!-- Valor -->
            <span id="valor-projeto" class="tag valor"></span>
        </div>

        <!-- Parágrafo para exibir a descrição do projeto -->
        <p id="descricao-projeto" class="descricao-texto"></p>

        <div class="btn-wrapper">
            <a class="btn normal-btn outline-btn">Candidatos inscritos</a>
            <a href="#" id="excluirProjeto" class="btn small-btn delete-btn">Excluir projeto</a>
            <a href="#" id="alterarProjeto" class="btn small-btn">Alterar dados</a>
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
        descricaoProjeto.textContent = descricao + currentProjectId;

        // adicionando o ID do projeto como um parâmetro na URL dos links "Excluir projeto" e "Alterar dados"
        var linkExcluir = document.getElementById("excluirProjeto");
        var linkAlterar = document.getElementById("alterarProjeto");
        linkExcluir.href = "../../php/anunciante/script_excluirProjeto.php?id=" + currentProjectId;
        linkAlterar.href = "../../pages/anunciante/alterar-projeto.php?id=" + currentProjectId;

        // abrindo o modal
        modal.style.display = "flex";
    }

    // função para fechar o modal
    function fecharModal() {
        var modal = document.getElementById("projectModal");
        modal.style.display = "none";
    }
</script>