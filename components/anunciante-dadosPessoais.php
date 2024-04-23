<?php
$conn = conectar();

$id_anunciante = $_SESSION['user_id'];

$sql = "SELECT nome, nome_empresa, cnpj, email FROM anunciante WHERE id = $id_anunciante";
$stmt = $conn->query($sql);

if (!$stmt) {
    die("Erro na consulta: " . $conn->errorInfo()[2]);
}

$dados_anunciante = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se o campo CNPJ está vazio para decidir sobre o atributo readonly
if (empty($dados_anunciante['cnpj'])) {
    $cnpjReadOnly = ""; // Se estiver vazio, não será readonly
    $cnpjInput = "class=''";
} else {
    $cnpjReadOnly = "readonly class='emailCandidato-input'"; // Caso contrário, será readonly
    $cnpjInput = "input-fill";
}
?>

<div class="dados-wrapper">
    <!-- perfil -->
    <div class="profile-aside">
        <span>PERFIL</span>
        <div class="profile-icon profile-candidato">
            <span class="material-symbols-outlined">person</span>
        </div>
        <p class="nome-candidato"><?php echo $dados_anunciante['nome']; ?></p>
    </div>

    <!-- dados -->
    <div class="col">
        <!-- formulario de atualização dos dados do candidato -->
        <form class="form-1" action="../../php/anunciante/script_dadosAnunciante.php" method="post" id="form-anunciante">
            <!-- dados do candidato -->
            <h4>Dados do Anunciante</h4>
            <!-- nome completo -->
            <div class="form-item">
                <input type="text" name="nome" id="nome-input" value="<?php echo $dados_anunciante['nome']; ?>" required />
                <label for="nome-input">Nome completo*</label>
            </div>

            <!-- segunda linha -->
            <div class="form-item">
                <input type="email" name="email" id="emailCandidato-input"  class="emailCandidato-input" autocomplete="email" value="<?php echo $dados_anunciante['email']; ?>" readonly />
                <label for="emailCandidato-input" class="input-fill">E-mail*</label>
            </div>

            <!-- terceira linha -->
            <div class="row">
                <!-- nome empresa -->
                <div class="form-item">
                    <input type="text" name="nome_empresa" id="nomeEmpresa-input" value="<?php echo $dados_anunciante['nome_empresa']; ?>" required />
                    <label for="nomeEmpresa-input">Nome da empresa*</label>
                </div>
                <!-- cnpj -->
                <div class="form-item">
                    <input type="text" name="cnpj" id="cnpj-input" value="<?php echo $dados_anunciante['cnpj']; ?>" required <?php echo $cnpjReadOnly; ?> />
                    <label for="cnpj-input" class="<?php echo $cnpjInput; ?>">CNPJ*</label>
                </div>

            </div>

            <!-- botões -->
            <div class="btn-wrapper">
                <!-- botões -->
                <div class="btn-wrapper">
                    <a href="#" onclick="abrirModalAnunciante(event)" class="btn small-btn">Salvar</a>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- modal de confirmação de atualização de dados -->
<div class='modal modal-delete' id="modalDadosAnunciante">
    <div class='modal-content'>
        <span class='modal-close close-icon material-symbols-outlined closeModal'> close </span>
        <span class='icon material-symbols-outlined'> help </span>
        <h3>Tem certeza?</h3>
        <p>Seus dados de acesso serão atualizados em nossa base de dados. Tem certeza que deseja continuar?</p>
        <div class='btn-wrapper'>
            <a href='#' class='btn small-btn cancel-btn closeModal'>Cancelar</a>
            <a href='#' id="confirmButtonAnunciante" class='btn small-btn'>Sim</a>
        </div>
    </div>
</div>

<!-- Modal de Alerta de Campo Vazio -->
<div id="confirmVazio" class="modal modal-confirm" style="display: none;">
    <div class="modal-content">
        <span class="modal-close close-icon material-symbols-outlined"> close </span>

        <span class="icon material-symbols-outlined"> cancel </span>
        <h3>Campos Vazios!</h3>
        <p>Por favor, preencha todos os campos obrigatórios!</p>
        <div class="btn-wrapper">
            <button class="btn small-btn outline-btn modal-close">Entendi</button>
        </div>
    </div>
</div>

<script>
    // Função para validar o formulário
    function validarFormulario() {
        var form = document.getElementById("form-anunciante");
        var camposObrigatorios = form.querySelectorAll("[required]");
        var camposPreenchidos = true;

        camposObrigatorios.forEach(function(campo) {
            if (campo.value.trim() === '') {
                camposPreenchidos = false;
            }
        });

        return camposPreenchidos;
    }

    // Função para abrir o modal de confirmação de atualização de dados
    function abrirModalAnunciante(event) {
        event.preventDefault(); // Impede o comportamento padrão do link

        // Validar o formulário antes de exibir o modal de confirmação
        if (!validarFormulario()) {
            // Exibir a modal de alerta de campo vazio, se necessário
            var modalVazio = document.getElementById("confirmVazio");
            modalVazio.style.display = "flex";
            return;
        }

        var modal = document.getElementById("modalDadosAnunciante");

        // Configurar o link de confirmação para enviar o formulário
        var confirmButton = modal.querySelector("#confirmButtonAnunciante");
        confirmButton.onclick = function(event) {
            event.preventDefault(); // Impede o comportamento padrão do link

            // Submeter o formulário para atualizar os dados do anunciante
            var form = document.getElementById("form-anunciante");
            form.submit();
        };

        // Abrir o modal de confirmação de atualização de dados
        modal.style.display = "flex";
    }

    // Função para fechar o modal de alerta de campo vazio
    function fecharModalVazio() {
        var modalVazio = document.getElementById("confirmVazio");
        modalVazio.style.display = "none";
    }
</script>