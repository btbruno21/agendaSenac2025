<?php
include 'inc/header.php';
include 'classes/contatos.php';
$contato = new Contato();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $contato->buscar($id);
    if (empty($info['email'])) {
        header("Location: /agendaSenac2025");
        exit;
    }
} else {
    header("Location: /agendaSenac2025");
    exit;
}

if (!empty($_POST['id'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redeSocial = $_POST['redeSocial'];
    $profissao = $_POST['profissao'];
    $dtNasc = $_POST['dtNasc'];
    if (isset($_FILES['foto'])) {
        $foto = $_FILES['foto'];
    } else {
        $foto = array();
    }
    $ativo = $_POST['ativo'];
    if (!empty($email)) {
        $contato->editar($nome, $endereco, $email, $telefone, $redeSocial, $profissao, $dtNasc, $foto, $ativo, $_GET['id']);
    }
    header('Location: /agendaSenac2025');
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $contato->getContato($_GET['id']);
} else{
    ?>
    <script type="text/javascript">window.location.href="index.php";</script>
    <?php
    exit;
}
?>
<main>
    <div class="formulario">
        <h1>EDITAR CONTATO</h1>
    </div>

    <form method="POST" enctype="multipart/form-data"> <!-- permite adicionar imagens no form -->
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $info['nome']; ?>" />
        </div>

        <div class="form-group">
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $info['endereco']; ?>" />
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $info['email']; ?>" />
        </div>

        <div class="form-group">
            <label>Telefone:</label>
            <input type="tel" name="telefone" value="<?php echo $info['telefone']; ?>" />
        </div>

        <div class="form-group">
            <label>Rede Social:</label>
            <input type="text" name="redeSocial" value="<?php echo $info['redeSocial']; ?>" />
        </div>

        <div class="form-group">
            <label>Profissão:</label>
            <input type="text" name="profissao" value="<?php echo $info['profissao']; ?>" />
        </div>

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="dtNasc" value="<?php echo $info['dtNasc']; ?>" />
        </div>

        <div class="form-group">
            <label>Foto:</label>
            <input type="file" name="foto[]" multiple />
            <div class="grupo">
                <div class="cabecalho">
                    <label>Foto Contato</label>
                </div>
                <div class="corpo">
                    <?php foreach ($info['foto'] as $fotos): ?>
                        <div class="foto_item">
                            <img src="img/contatos/<?php echo $fotos['url']; ?>" />
                            <a href="excluir_foto.php?id=<?php echo $fotos['id']; ?>">Excluir Imagem</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Ativo:</label>
            <input type="text" name="ativo" value="<?php echo $info['ativo']; ?>" />
        </div>

        <input type="submit" value="SALVAR" />
    </form>
</main>
<?php
include 'inc/footer.php';
?>