<?php
require 'header.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
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
        <td><?=$usuario['id'];?></td>
        <td><?=$usuario['nome'];?></td>
        <td><?=$usuario['email'];?></td>
        <td>
            <a href="editar.php?id=<?=$usuario['id'];?>">[Editar]</a>
            <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Confirma DELETE');">[excluir]</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require 'footer.php';
?>