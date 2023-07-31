<?php

    require_once '../conexao/Conexao.php';
    require_once '../model/Usuario.php';
    require_once '../dao/UsuarioDao.php';

    //instancia as classes
    $usuario = new Usuario();
    $usuariodao = new UsuarioDao();

    //Pega todos os dados passados por POST

    //$d = filter_input_array(INPUT_POST);

    //Se a operação for gravar entra nessa condição

    if(isset($_POST['cadastrar']))
    {
        $usuario->setNome($_POST['nome']);
        $usuario->setSobrenome($_POST['sobrenome']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setIdade($_POST['idade']);

        $usuariodao->create($usuario);

        header("Location: ../../");
    }
    //Se a requisição for editar
    elseif(isset($POST['editar']))
    {
        $usuario->setNome($_POST['nome']);
        $usuario->setSobrenome($_POST['sobrenome']);
        $usuario->setIdade($_POST['idade']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setId($_POST['id']);

        $usuariodao->update($usuario);
        header("Location: ../../");
    }

    //Se a requisição for Deletar
    elseif(isset($_GET['del']))
    {
        $usuario->setId($GET['del']);
        $usuariodao->delete($usaurio);

        header("Location: ../../");
    }
    else
    {
        header("Location: ../../");
    }
?>