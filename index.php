<?php
include 'inc/header.php';
include 'classes/contatos.php';
include 'classes/funcoes.php';

$contato = new Contato();
$fn = new Funcoes();
?>
<main>
    <div class="button">
        <button><a href="adicionarContato.php">Adicionar um contato</a></button>
    </div>
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
                <th>AÇÕES</th>
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
                    <td class="acoes">
                        <a href="editarContato.php?id=<?php echo $item['id'] ?>">EDITAR </a>
                        |
                        <a href="excluirContato.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza que quer excluir esse contato?')"> EXCLUIR</a>
                    </td>
                </tr>
            </tbody>
        <?php
        endforeach;
        ?>
    </table>
</main>

<?php include 'inc/footer.php'; ?>