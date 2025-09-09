<?php
require 'inc/header.php';
include 'classes/usuario.php';
$usuario = new Usuario();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $usuario->buscarUsuario($id);
    $permissoes = $info['permissoes'];
    if (empty($info['email'])) {
        echo '<script type="text/javascript">alert("Nenhum usuário com este ID");window.location.href = "infoUser.php";</script>';
        exit;
    }
} else {
    header("Location: /agendaSenac2025");
    exit;
}
?>

<div class="formulario">
    <h1>EDITAR USUÁRIO</h1>
</div>

<div class="user">
    <form method="POST" action="editarUsuarioSubmit.php">
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $info['nome']; ?>" />
        <label>Email:</label>
        <input type="mail" name="email" value="<?php echo $info['email']; ?>" />
        <div class="checkbox">
            <label>Permissões</label><br>
            <input type="checkbox" name="permissoes[]" value="add" <?php if(in_array("add", $permissoes)) echo "checked"; ?>>
            <label>Adicionar usuários</label><br>
            <input type="checkbox" name="permissoes[]" value="del" <?php if(in_array("del", $permissoes)) echo "checked"; ?>>
            <label>Deletar usuários</label><br>
            <input type="checkbox" name="permissoes[]" value="edit" <?php if(in_array("edit", $permissoes)) echo "checked"; ?>>
            <label>Editar usuários</label><br>
            <input type="checkbox" name="permissoes[]" value="super" <?php if(in_array("super", $permissoes)) echo "checked"; ?>>
            <label>Super</label>
        </div>
        <input type="submit" value="SALVAR" />
    </form>
</div>

<?php
require 'inc/footer.php';
?>