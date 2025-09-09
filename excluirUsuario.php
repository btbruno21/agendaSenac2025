<?php
include 'classes/usuario.php';
$usuario = new Usuario();

$id = $_GET['id'] ?? null;

if ($id && $usuario->deletarUsuario($id)) {
    // Usuário deletado com sucesso
    echo '<script>alert("Usuário deletado com sucesso!"); window.location.href="infoUser.php";</script>';
} else {
    // Nenhum usuário encontrado com esse ID
    echo '<script>alert("Nenhum usuário encontrado com este ID!"); window.location.href="infoUser.php";</script>';
}

?>