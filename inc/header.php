<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fredoka+One&display=swap" rel="stylesheet">
    <title>AgendaSenac2025</title>
    <link rel="icon" type="image/x-icon" href="img/Senac.ico">
</head>

<body>
    <header>
        <a href="index.php"><img src="img/Senac.png">
            <h1>Agenda Senac 2025</h1>
        </a>
        <?php if ($_SESSION['logado']): ?>
            <div class="links">
                <a href="sair.php">Sair</a>
            </div>
        <?php endif; ?>
    </header>