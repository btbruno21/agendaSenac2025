<?php include 'inc/header.php' ?>
<div class="formulario">
    <h1>CRIAR USUÁRIO</h1>
</div>
<form method="POST" action="criarUsuarioSubmit.php">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" />
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="mail" name="email" />
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="senha" />
    </div>

    <div class="form-group">
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
    </div>

    <input type="submit" name="btCadastrar" value="CRIAR USUÁRIO" />
</form>
<?php include 'inc/footer.php' ?>