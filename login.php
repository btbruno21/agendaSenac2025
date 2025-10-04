<?php
include 'inc/header.php';
session_start();
require 'classes/usuario.php';

if (!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuario = new Usuario();
    if ($usuario->fazerLogin($email, $senha)) {
        header("Location: index.php");
    } else {
        echo '<span style="color:red">' . "Usuario e/ou senha incorretos" . '</span>';
    }
}
?>
<main>
    <div class="formulario">
        <h1>LOGIN</h1>
    </div>
    <form method="POST">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email">
        </div>
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha">
        </div>

        <a href="esqueceuSenha">Esqueceu sua senha? Clique aqui</a><br>
        <input type="submit" value="LOGIN"/>
    </form>
</main>