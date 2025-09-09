<?php require 'inc/header.php' ?>
<div class="user">
    <form method="POST" action="criarUsuarioSubmit.php">
        <label>Nome:</label>
        <input type="text" name="nome" />
        <label>Email:</label>
        <input type="mail" name="email" />
        <label>Senha:</label>
        <input type="password" name="senha" />
        <div class="checkbox">
            <label>Permissões:</label><br>
            <input type="checkbox" name="permissoes[]" value="add">
            <label>Adicionar usuários</label><br>
            <input type="checkbox" name="permissoes[]" value="del">
            <label>Deletar usuários</label><br>
            <input type="checkbox" name="permissoes[]" value="edit">
            <label>Editar usuários</label><br>
            <input type="checkbox" name="permissoes[]" value="super">
            <label>Super</label>
        </div>
        <input type="submit" name="btCadastrar" value="CRIAR USUÁRIO" />
    </form>
</div>
<?php require 'inc/footer.php' ?>