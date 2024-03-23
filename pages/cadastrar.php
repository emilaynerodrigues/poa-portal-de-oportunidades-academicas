<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Faça seu cadastro - POA</title>

    <!-- links css -->
    <link rel="stylesheet" href="../styles/main.css" />

    <!-- link favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />

    <!-- link font symbols -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
  </head>
  <body id="cadastrar">
    <header class="header">
      <a href="../index.html">
        <img
          src="../img/logo-escura.png"
          alt="Logo do Portal de Oportunidades Acadêmicas"
          class="logo"
          style="height: 50px"
        />
      </a>
    </header>

    <main class="container">
      <!-- conteudo principal -->
      <div class="content-wrapper">
        <!-- informação call to action -->
        <div class="cta-info">
          <h2>Criar Conta</h2>
          <p>
            Crie uma conta para encontrar e publicar projetos no Portal de
            Oportunidades
          </p>
        </div>

        <form action="">
          <div class="flex-row">
            <!-- nome -->
            <div class="form-item">
              <input type="text" name="nome" id="nome-input" required />
              <label for="nome-input">Nome</label>
            </div>

            <!-- sobrenome -->
            <div class="form-item">
              <input
                type="text"
                name="sobrenome"
                id="sobrenome-input"
                required
              />
              <label for="sobrenome-input">Sobrenome</label>
            </div>
          </div>

          <!-- cpf -->
          <div class="form-item">
            <input type="text" name="cpf" id="cpf-input" required />
            <label for="cpf-input">CPF</label>
          </div>

          <!-- email -->
          <div class="form-item">
            <input type="text" name="email" id="email-input" required />
            <label for="email-input">E-mail</label>
          </div>

          <!-- senha -->
          <div class="form-item">
            <input type="password" name="senha" id="senha-input" required />
            <label for="senha-input">Senha</label>
            <span
              id="toggle-senha"
              class="toggle-senha password material-symbols-outlined"
              >visibility</span
            >
          </div>

          <button type="submit">Cadastrar</button>
        </form>

        <!-- call to action prompt -->
        <div class="cta-prompt">
          <p>
            Já possui uma conta conta?
            <span><a href="../pages/login.html">Faça login</a></span>
          </p>
        </div>
      </div>

      <!-- imagem -->
      <img
        src="../img/cadastrar-img.svg"
        alt="Representação gráfica de jovem com um telefone celular"
        class="img-inicio"
        style="height: 400px"
      />
    </main>

    <!-- vetor de fundo -->
    <img src="../img/elipse.svg" alt="elipse" class="absolute" />

    <script src="../js/senha.js"></script>
  </body>
</html>
