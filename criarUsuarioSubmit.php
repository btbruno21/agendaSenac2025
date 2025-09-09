<?php
include 'classes/usuario.php';
$usuario = new Usuario();

if (!empty($_POST['email'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (isset($_POST['permissoes'])) {
        foreach ($_POST['permissoes'] as $p) {
            echo "Permissão: $p <br>";
        }
    }

    $permissoes = implode(",", $_POST['permissoes']);
    $usuario->adicionarUsuario($email, $nome, $senha, $permissoes);
    header('Location: infoUser.php');
} else {
    echo '<script type="text/javascript">alert("Email já cadastrado!")</script>';
}