<?php
include 'inc/header.php';
include 'classes/usuario.php';
session_start();
$usuario = new Usuario();

$usuario->setUsuario($_SESSION['logado']);
if (!($usuario->temPermissao("super"))) {
    header("Location: index.php");
    exit;
}
?>

<main>
    <div class="button">
        <button><a href="criarUsuario.php">Criar um Usuário</a></button>
    </div>
    <table class="tabela-contatos">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>PERMISSÕES</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php
        $lista = $usuario->listarUsuario();
        foreach ($lista as $item):
        ?>
            <tbody>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['permissoes']; ?></td>
                    <td class="acoes">
                        <a href="editarUsuario.php?id=<?php echo $item['id'] ?>">EDITAR</a>
                        |
                        <a href="excluirUsuario.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza que quer excluir esse contato?')">EXCLUIR</a>
                    </td>
                </tr>
            </tbody>
        <?php
        endforeach;
        ?>
    </table>
</main>

<?php include 'inc/footer.php'; ?>