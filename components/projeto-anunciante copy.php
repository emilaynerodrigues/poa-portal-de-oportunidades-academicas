<div id="projectModal" class="modalmodal-confirm">
    <div class="modal-content">
        <!-- icon para fechar o modal -->
        <span class="close-icon material-symbols-outlined" onclick="fecharModal()"> close </span>

        <div class="head-projeto">
            <div class="user-icon"></div>
            <div class="projeto-info">
                <!-- titulo do projeto -->
                <h3 id="titulo-projeto" class="titulo-projeto"></h3>
                <p class="info-adicional">por
                    <!-- nome do autor  -->
                    <span id="autor-projeto" class="anunciante"></span>
                </p>
            </div>
        </div>

        <div class="tags-projeto">
            <!-- formato de trabalho (remoto ou presencial) -->
            <span id="formato-projeto" class="tag formato">
            </span>

            <!-- categoria -->
            <span id="categoria-projeto" class="tag categoria">
            </span>

            <!-- valor -->
            <span id="valor-projeto" class="tag valor">
            </span>
        </div>

        <!-- parágrafo para exibir a descrição do projeto -->
        <p id="descricao-projeto" class="descricao-texto"> </p>

        <div class="btn-wrapper">
            <a class="btn normal-btn outline-btn">Candidatos inscritos</a>
            <a class="btn small-btn delete-btn">Excluir projeto</a>
            <a href="../../pages/anunciante/alterar-projeto.php" class="btn small-btn">Alterar dados</a>
        </div>
    </div>
</div>

<script>
    // função para abrir o modal e exibir a descrição do projeto
    function abrirModal(link) {
        var modal = document.getElementById("projectModal");
        var tituloProjeto = document.getElementById("titulo-projeto");
        var autorProjeto = document.getElementById("autor-projeto");
        var categoriaProjeto = document.getElementById("categoria-projeto");
        var formatoProjeto = document.getElementById("formato-projeto");
        var valorProjeto = document.getElementById("valor-projeto");
        var descricaoProjeto = document.getElementById("descricao-projeto");

        // obtendo a descrição do projeto do atributo de dados do link
        var titulo = link.getAttribute("data-titulo");
        var autor = link.getAttribute("data-autor");
        var categoria = link.getAttribute("data-categoria");
        var formato = link.getAttribute("data-formato");
        var valor = link.getAttribute("data-valor");
        var descricao = link.getAttribute("data-descricao");


        // atualizando o conteudo do modal com os dados vindos do banco de dados pela prop "data-"
        tituloProjeto.textContent = titulo;
        autorProjeto.textContent = autor;
        categoriaProjeto.textContent = categoria;
        formatoProjeto.textContent = formato;
        valorProjeto.textContent = "R$ " + valor;
        descricaoProjeto.textContent = descricao;

        // abrindo o modal
        modal.style.display = "flex";
    }

    // função para fechar o modal
    function fecharModal() {
        var modal = document.getElementById("projectModal");
        modal.style.display = "none";
    }
</script>