<?php include 'inc/header.php'; ?>

<div class="infoUser">
    <button><a href="criarUsuario.php">Criar usuário</a></button>
    <form action="editarUsuario.php" method="get">
        <label>ID:</label>
        <input type="number" name="id" />
        <button type="submit">Editar usuário</button>
    </form>
    <form action="excluirUsuario.php" method="get">
        <label>ID:</label>
        <input type="number" name="id" />
        <button type="submit" onclick="return confirm('Você tem certeza que quer excluir esse contato?')">Excluir usuário</button>
    </form>
</div>
<?php include 'inc/header.php'; ?>