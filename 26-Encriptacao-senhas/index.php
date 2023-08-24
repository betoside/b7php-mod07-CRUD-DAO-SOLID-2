<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptação de senha</title>
    <style>
        .sim{ color: green; }
        .nao{ color: red; }
        .comecar{ position: fixed; top: 20px; right: 20px; }
    </style>
</head>
<body>

    <h2>#26: Encriptação de senhas</h2>

    <form method="GET">
        <button class="comecar">Recomeçar</button>
    </form>

    <div class="container">

        <?php 
        $etapa = filter_input(INPUT_GET, 'etapa');

        if(empty($etapa)):
        ?>

        <div class="senha">
            <form method="GET">
                Digite uma senha <br>
                <input type="hidden" name='etapa' value='gerar_hash'>
                <input type="text" name='senha' required>
                <br>
                <button>Gerar hash</button>
            </form>
        </div>

        <?php
        endif;

        if($etapa === 'gerar_hash'):
            $senha = filter_input(INPUT_GET, 'senha');
            $hash = password_hash($senha, PASSWORD_DEFAULT);
        ?>
            <div class="senha">
                <form method="GET">
                    Pode alterar a senha para testar o hash <br>
                    <input type="hidden" name='etapa' value='testar_hash'>
                    <input type="hidden" name='senha_original' value='<?=$senha;?>'>
                    <input type="hidden" name='hash' value='<?=$hash;?>'>
                    Senha original: <strong><?=$senha;?></strong><br>
                    Hash: <strong><?=$hash;?></strong><br>
                    <input type="text" name='senha_testar' value="<?=$senha;?>">
                    <br>
                    <button>Testar senha</button>
                </form>
            </div>
        <?php 
        endif;

        if($etapa === 'testar_hash'):
            $senha = filter_input(INPUT_GET, 'senha_original');
            $hash = filter_input(INPUT_GET, 'hash');
            $senha_testar = filter_input(INPUT_GET, 'senha_testar');

            // echo "senha original: " . $senha . "<br>";
            // echo "senha p testar: " . $senha_testar . "<br>";
            // echo "hash: " . $hash;
            if(password_verify($senha_testar, $hash)){
                echo "<h2 class='sim'>sucesso</h2>";
            } else {
                echo "<h2 class='nao'>erro</h2>";
            }
        ?>

            <div class="senha">
                <form method="GET">
                    Pode alterar a senha para testar o hash <br>
                    <input type="hidden" name='etapa' value='testar_hash'>
                    <input type="hidden" name='senha_original' value='<?=$senha;?>'>
                    <input type="hidden" name='hash' value='<?=$hash;?>'>
                    Senha original: <strong><?=$senha;?></strong><br>
                    Hash: <strong><?=$hash;?></strong><br>
                    <input type="text" name='senha_testar' value="<?=$senha_testar;?>">
                    <br>
                    <button>Testar senha</button>
                </form>
            </div>
        <?php
        endif;
        ?>
    </div>

    <pre>

    password_hash(senha, PASSWORD_DEFAULT)
    password_verify(senha, hash)

    2 tipos mais utilizados hoje:
    - PASSWORD_DEFAULT // pode ir até 255 caracteres. é a recomendação do PHP
    - PASSWORD_BCRYPT  // 60 caracteres sempre

    $senha = '1234'; // senha literal

    salvar a senha encriptada
    vários caracteres representam a senha
    gerar um hash para a senha. password_hash($senha, PASSWORD_DEFAULT)

    Não tem como reverter o hash para a senha 
    mas tem como verificar

    outras opções:

    - md5()
    vulnerabilidade: é possível, quase nula a possibilidade, existir o mesmo hash 
    para duas senhas diferentes

    $senha = '1234'
    $senha = '7894'
    $hash = md5($senha)
    echo $hash

    </pre>
    
</body>
</html>