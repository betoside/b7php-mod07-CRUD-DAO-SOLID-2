<?php
require 'header.php';
require 'dao/UsuarioDAOMySQL.php';

$usuarioDAO = new UsuarioDaoMysql($pdo);
$lista = $usuarioDAO->findAll();
?>

<a href="adicionar.php">Adicionar usuário</a>
<br>
<br>
<h1>Users</h1>

<table style="border-collapse: collapse; width:100%; border: 1px solid blue;" border="1">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
    <tr>
        <td><?=$usuario->getId();?></td>
        <td><?=$usuario->getNome();?></td>
        <td><?=$usuario->getEmail();?></td>
        <td>
            <a href="editar.php?id=<?=$usuario->getId();?>">[Editar]</a>
            <a href="excluir.php?id=<?=$usuario->getId();?>" onclick="return confirm('Confirma DELETE');">[excluir]</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require 'footer.php';
?>