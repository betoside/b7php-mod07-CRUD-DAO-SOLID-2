<?php
require 'header.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch( PDO::FETCH_ASSOC );
    } else {
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>
<a href="adicionar.php">Adicionar usuário</a>
<br>
<br>

<h1>Editar Users</h1>

    <form method="POST" action="editar_action.php">

        <input type="hidden" name="id" value="<?=$info['id'];?>" />

        <label>
            Nome: <br />
            <input type="text" name="name" placeholder="Nome" value="<?=$info['nome'];?>" />
        </label> <br /><br />

        <label>
            E-mail: <br />
            <input type="email" name="email" placeholder="E-mail" value="<?=$info['email'];?>" />
        </label> <br /><br />

        <input type="submit" value="Editar" />

    </form>
    
<?php
require 'footer.php';
?>