<?php
require 'header.php';
?>

<h1>Adicionar Users</h1>

    <form method="POST" action="adicionar_action.php">

        <label>
            Nome: <br />
            <input type="text" name="name" placeholder="Nome" />
        </label> <br /><br />

        <label>
            E-mail: <br />
            <input type="email" name="email" placeholder="E-mail" required />
        </label> <br /><br />

        <input type="submit" value="Adicionar" />

    </form>
    
<?php
require 'footer.php';
?>