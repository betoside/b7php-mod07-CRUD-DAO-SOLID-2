<?php
require 'header.php';
require 'dao/UsuarioDAOMySQL.php';
$usuarioDAO = new UsuarioDaoMysql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');
if($id){
    $usuario = $usuarioDAO->findById($id);
}
if($usuario === false){
    header('Location: index.php');
    exit;
}
?>
<a href="adicionar.php">Adicionar usuário</a>
<br>
<br>

<h1>Editar Users</h1>

    <form method="POST" action="editar_action.php">

        <input type="hidden" name="id" value="<?=$usuario->getId();?>" />

        <label>
            Nome: <br />
            <input type="text" name="name" placeholder="Nome" value="<?=$usuario->getNome();?>" />
        </label> <br /><br />

        <label>
            E-mail: <br />
            <input type="email" name="email" placeholder="E-mail" value="<?=$usuario->getEmail();?>" />
        </label> <br /><br />

        <input type="submit" value="Editar" />

    </form>
    
<?php
require 'footer.php';
?>