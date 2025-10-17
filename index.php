<?php
include 'inc/header.php';
include 'classes/contatos.php';
include 'classes/funcoes.php';
require_once 'classes/usuario.php';

$contato = new Contato();
$fn = new Funcoes();
$usuario = new Usuario();

session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$usuario->setUsuario($_SESSION['logado']);
?>
<main>
    <?php if ($usuario->temPermissao("add")): ?>
        <div class="button">
            <button><a href="adicionarContato.php">Adicionar um contato</a></button>
        </div>
    <?php endif; ?>
    <table class="tabela-contatos">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>ENDEREÇO</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>REDE SOCIAL</th>
                <th>PROFISSÃO</th>
                <th>NASCIMENTO</th>
                <th>FOTO</th>
                <th>ATIVO</th>
                <?php if ($usuario->temPermissao("edit") || $usuario->temPermissao("del")): ?>
                    <th>AÇÕES</th>
                <?php endif; ?>
            </tr>
        </thead>
        <?php
        $lista = $contato->listar();
        foreach ($lista as $item):
        ?>
            <tbody>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['endereco']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['telefone']; ?></td>
                    <td><?php echo $item['redeSocial']; ?></td>
                    <td><?php echo $item['profissao']; ?></td>
                    <td><?php echo $fn->dtNasc($item['dtNasc'], 2); ?></td>
                    <td><?php echo $item['foto']; ?></td>
                    <td><?php echo $item['ativo']; ?></td>
                    <?php if ($usuario->temPermissao("edit") || $usuario->temPermissao("del")): ?>
                        <td class="acoes">
                            <?php if ($usuario->temPermissao("edit")): ?>
                                <a href="editarContato.php?id=<?php echo $item['id'] ?>">EDITAR </a>
                            <?php endif; ?>
                            <?php if ($usuario->temPermissao("edit") && $usuario->temPermissao("del")): ?>
                                |
                            <?php endif?>
                            <?php if ($usuario->temPermissao("del")): ?>
                                <a href="excluirContato.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza que quer excluir esse contato?')"> EXCLUIR</a>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
            </tbody>
        <?php
        endforeach;
        ?>
    </table>
    <?php if ($usuario->temPermissao("super")): ?>
    <div class="button">
        <button><a href="infoUser.php">Usuario</a></button>
    </div>
    <?php endif; ?>
</main>

<?php include 'inc/footer.php'; ?>