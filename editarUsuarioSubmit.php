<?php
include 'classes/usuario.php';
$usuario = new Usuario();

if (!empty($_POST['id'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $permissoes = $_POST['permissoes'] ?? []; // se não existir, cria array vazio
    $permissoes = implode(",", $permissoes);

    $id = $_POST['id'];

    if (!empty($email)) {
        $usuario->editarUsuario($nome, $email, $permissoes, $id);
        header("Location: infoUser.php");
    }
}
