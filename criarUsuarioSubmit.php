<?php
include 'classes/usuario.php';
$usuario = new Usuario();

if (!empty($_POST['email'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $permissoes = $_POST['permissoes'] ?? [];
    $permissoes = implode(",", $permissoes);

    $usuario->adicionarUsuario($email, $nome, $senha, $permissoes);
    header('Location: infoUser.php');
} else {
    echo '<script type="text/javascript">alert("Email já cadastrado!")</script>';
}
