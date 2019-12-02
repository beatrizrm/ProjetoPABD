<!DOCTYPE html>
<?php  include('Aluno.php'); 
?>
<html>
<head>
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Aluno</h1>
    <form method="post" action="AlunoCadastra.php" >
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
                    onclick="location.href='AlunoLista.php';">Listar
            </button>
        </div>
        
    </form>
    
    
    <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $a = new Aluno();
            $a->insere($codigo, $nome);

            header('location: AlunoLista.php');
        }
    ?>
    
</body>
</html>
