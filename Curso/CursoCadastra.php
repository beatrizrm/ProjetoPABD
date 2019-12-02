<!DOCTYPE html>
<?php  include('Curso.php'); ?>
<html>
<head>
    <title>Cadastro de Curso</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Curso</h1>
    <form method="post" action="CursoCadastra.php" >
        <div class="input-group">
            <label>Código:</label>
            <input type="text" name="codigo" value="">
        </div>
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='CursoLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $c = new Curso();
            $c->insere($codigo, $nome);

            header('location: CursoLista.php');
        }
    ?>
</body>
</html>
