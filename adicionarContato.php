<?php
include 'inc/header.php';
?>
<main>
    <div class="formulario">
        <h1>ADICIONAR CONTATO</h1>
    </div>

    <form method="POST" action="adicionarContatoSubmit.php">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" />
        </div>

        <div class="form-group">
            <label>Endereço:</label>
            <input type="text" name="endereco" />
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" />
        </div>

        <div class="form-group">
            <label>Telefone:</label>
            <input type="tel" name="telefone" />
        </div>

        <div class="form-group">
            <label>Rede Social:</label>
            <input type="text" name="redeSocial" />
        </div>

        <div class="form-group">
            <label>Profissão:</label>
            <input type="text" name="profissao" />
        </div>

        <div class="form-group">
            <label>Data de nascimento:</label>
            <input type="date" name="dtNasc" />
        </div>

        <div class="form-group">
            <label>Foto:</label>
            <input type="text" name="foto" />
        </div>

        <div class="form-group">
            <label>Ativo:</label>
            <input type="text" name="ativo" />
        </div>

        <input type="submit" name="btCadastrar" value="ADICIONAR" />
    </form>
</main>
<?php
include 'inc/footer.php';
?>