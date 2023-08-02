<?php

include_once 'app/conexao/Conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['Enviar']))
{
    $nomeBusca = $_POST['nomeBusca'];

    $query = "SELECT * FROM usuario
    WHERE nome LIKE '$nomeBusca'";

    $result = Conexao::getConexao()->prepare($query);

    $result->execute();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Nome:<input type="text" name="nomeBusca">
        <input type="submit" name="Enviar" value="Enviar">
    </form>

    <?php

    include_once 'app/conexao/Conexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['Enviar']))
    {
        $nomeBusca = $_POST['nomeBusca'];

        $query = "SELECT * FROM usuario
        WHERE nome LIKE '$nomeBusca'";

        $result = Conexao::getConexao()->prepare($query);

        $result->execute();
    }
    ?>


    <div class="table-responsive">
        <table class="table table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Idade</th>
                    <th>Sexo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?= $row['id'] . "<br>" ?></td>
                        <td><?= $row['nome'] . "<br>" ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>   
    </div> 
                        
</body>
</html>