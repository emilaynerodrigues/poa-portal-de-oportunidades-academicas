<?php
// Iniciar a sessão, se necessário
session_start();

// Incluir o arquivo de conexão com o banco de dados
include('../conexao.php');
$conn = conectar();

// Verificar se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o checkbox de confirmação foi marcado
    if (isset($_POST["confirmCheckbox"])) {
        // Consultar o ID do anunciante a ser excluído
        $anunciante_id = $_SESSION['user_id'];

        // Excluir os projetos associados ao anunciante
        $sql_projeto = "DELETE FROM projeto WHERE anunciante_id = :anunciante_id";
        $stmt_projeto = $conn->prepare($sql_projeto);
        $stmt_projeto->bindParam(':anunciante_id', $anunciante_id);

        // Excluir a conta do anunciante da tabela de anunciante
        $sql_anunciante = "DELETE FROM anunciante WHERE id = :anunciante_id";
        $stmt_anunciante = $conn->prepare($sql_anunciante);
        $stmt_anunciante->bindParam(':anunciante_id', $anunciante_id);

        // Iniciar uma transação para garantir a atomicidade das operações de exclusão
        $conn->beginTransaction();

        try {
            // Executar a exclusão dos projetos associados
            $stmt_projeto->execute();

            // Executar a exclusão do anunciante
            $stmt_anunciante->execute();

            // Confirmar a transação se todas as operações foram bem-sucedidas
            $conn->commit();

            // mensagem de conta excluida com sucesso
            header('Location: ../../index.php');
            $_SESSION['mensagem'] =
                "<!-- Modal de confirmação - Conta excluída com sucesso -->
                <div class='modal modal-session'>
                <div class='modal-content'>
                    <span class='icon material-symbols-outlined'> account_circle_off </span>
                    <h3>Conta excluída com sucesso!</h3>
                    <p>Sua conta foi removida do sistema com sucesso. Todos os dados associados foram permanentemente excluídos. Sentiremos sua falta, mas esperamos tê-lo de volta em breve, caso decida retornar.</p>
                    <div class='btn-wrapper'>
                        <a href='../../index.php' class='btn small-btn modal-close'>Entendi</a>
                    </div>
                </div>
                </div>";
            exit();
        } catch (Exception $e) {
            $conn->rollBack();
            // Se ocorrer um erro, desfazer a transação e exibir uma mensagem de erro
            $_SESSION["projeto-excluido"] = " 
            <!-- Modal de confirmação - Erro ao excluir a conta! -->
            <div class='modal modal-session'>
                <div class='modal-content'>
                    <a href='../../pages/anunciante/home.php'><span class='\modal-close close-icon material-symbols-outlined'> close </span></a>
                    <span class='icon material-symbols-outlined'> check_circle </span>
                    <h3>Erro ao excluir conta!</h3>
                    <p>Ocorreu um erro ao excluir a conta. Por favor, tente novamente mais tarde.</p>
                    <div class='btn-wrapper'>
                        <a href='../../pages/anunciante/home.php' class='btn small-btn modal-close'>Entendi</a>
                    </div>
                </div>
            </div>";
            exit();
        }
    } else {
        // Se o usuário não marcar o checkbox de confirmação, exibir uma mensagem de erro
        echo "<script>alert('Por favor, marque a caixa de confirmação para excluir sua conta de anunciante e projetos associados.');</script>";
        exit(); // Encerrar o script para evitar qualquer saída adicional
    }
} else {
    // Se o formulário não foi enviado via método POST, exibir uma mensagem de erro
    echo "<script>alert('Envie o formulário para excluir sua conta de anunciante e projetos associados.');</script>";
    exit(); // Encerrar o script para evitar qualquer saída adicional
}