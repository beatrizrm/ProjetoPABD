<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php  include('idioma.php'); ?>
<html>
<head>
    <title>Cadastro de Idioma</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Idioma</h1>
    <form method="post" action="idiomaCadastrar.php" >
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
                    onclick="location.href='idiomaLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $id = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $c = new idioma();
            $c->insere($id, $nome);

            header('location: idiomaLista.php');
        }
    ?>
    </body>
</html>
