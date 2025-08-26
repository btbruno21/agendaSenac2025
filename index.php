<?php
include 'inc/header.php';
include 'classes/contatos.php';

$contato = new Contato();
?>
<main>
<button><a href="adicionarContato.php">Adicionar um contato</a></button>

    <table border="2" width="100%">
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
<?php
    $lista = $contato->listar();
    foreach($lista as $item):
?>
    <tbody>
        <tr>
            <td><?php echo $item['id'];?></td>
            <td><?php echo $item['nome'];?></td>
            <td><?php echo $item['endereco'];?></td>
            <td><?php echo $item['email'];?></td>
            <td><?php echo $item['telefone'];?></td>
            <td><?php echo $item['redeSocial'];?></td>
            <td><?php echo $item['profissao'];?></td>
            <td><?php echo $item['dtNasc'];?></td>
            <td><?php echo $item['foto'];?></td>
            <td><?php echo $item['ativo'];?></td>
            <td>
                <a href="editarContato.php?id=<?php echo $item['id']?>">EDITAR </a>
                <!-- <a href="#"> EXCLUIR</a> -->
            </td>
        </tr>
    </tbody>
<?php
    endforeach;
?>
    </table>
</main>

    <!-- private $id;
    private $nome;
    private $endereco;
    private $email;
    private $telefone;
    private $redeSocial;
    private $profissao;
    private $dtNasc;
    private $foto;
    private $ativo; -->

<?php include 'inc/footer.php';?>