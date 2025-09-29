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
?>

<div class="formulario">
    <h1>EDITAR CONTATO</h1>
</div>

<form method="POST" action="editarContatoSubmit.php">
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
        <input type="mail" name="email" value="<?php echo $info['email']; ?>" />
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
        <input type="text" name="foto" value="<?php echo $info['foto']; ?>" />
    </div>

    <div class="form-group">
        <label>Ativo:</label>
        <input type="text" name="ativo" value="<?php echo $info['ativo']; ?>" />
    </div>

    <input type="submit" value="SALVAR" />
</form>

<?php
include 'inc/footer.php';
?>