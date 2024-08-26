<!DOCTYPE html>
<html>
<?php
session_start();
 require_once('logica/Usuario.php');
 require_once('logica/UsuarioDAO.php'); 

 $codUsuario = $_SESSION['codUsuario'];

 $usuario=new Usuario();
 $usuario->setcodUsuario($codUsuario);
 $usuariosDAO = new UsuarioDAO();
 $retorno = $usuariosDAO->buscarUsuario($usuario);

?>
    <title>Editar Perfil</title>
</head>
<script type="text/javascript"></script>
<body>

<main>
    <section>
    <h3>Editar Perfil</h3>
    <form action="logica/logica_usuario.php" method="post">
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $retorno['nome']; ?>"></p>
      <p><label for="email">Email: </label><input type="text" name="email" id="email" value="<?php echo $retorno['email']; ?>"></p>
      <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf" value="<?php echo $retorno['cpf']; ?>"></p>
      <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" value="<?php echo $retorno['senha']; ?>"></p>
      <input type="hidden" id='codUsuario' name='codUsuario' value="<?php echo $retorno['codUsuario']; ?>">
      <p> <input type="submit" id='editar' name='editar' value="Editar">
      </p>        
        </form>
    </section>

    <section>
        <h3>Excluir Conta</h3>
        <form action="logica/logica_usuario.php" method="post" onsubmit="return confirma_excluir()">
            <input type="hidden" id="codUsuario" name="codUsuario" value="<?php echo htmlspecialchars($retorno['codUsuario']); ?>">
            <button type="submit" name="deletar" value="<?php echo htmlspecialchars($retorno['codUsuario']); ?>">Deletar</button>
        </form>
    </section>
</main>

<script type="text/javascript">
    function confirma_excluir() {
        return confirm("Tem certeza que deseja excluir sua conta? Essa ação não pode ser desfeita.");
    }
</script>
</main>
</body>
</html>