<!DOCTYPE html>
<?php  include('Obra.php'); ?>
<html>
<head>
    <title>Cadastro de Obra</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script>
    function validarFormulario(){
        var nome = document.forms["form"]["nome"].value;
        if(nome ==""){
            alert("Campo vazio");
            return false;
        }
    }
    </script>
</head>
<body>
    <h1 align="center">Cadastro de Obra</h1>
    <form method="post" action="ObraCadastra.php" name="form" action="/action_page.php" onsubmit="return validarFormulario()">
        <div class="input-group">
            <label>Código:</label>
            <input type="number" name="codigo" value="">
        </div>
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='ObraLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $o = new Obra();
            $o->insere($codigo, $nome);

            header('location: ObraLista.php');
        }
    ?>
</body>
</html>
