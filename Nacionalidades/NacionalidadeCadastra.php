<!DOCTYPE html>
<?php  include('Nacionalidade.php'); ?>
<html>
<head>
    <title>Cadastro de Nacionalidade</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script>
    function validarFormulario(){
        var nome = document.forms["form"]["nome"].value;
        var codigo = document.forms["form"]["codigo"].value;
        if(nome =="" | codigo ==""){
            alert("Campo vazio");
            return false;
        }
    }
    </script>
</head>
<body>
    <h1 align="center">Cadastro de Nacionalidade</h1>
    <form method="post" action="NacionalidadeCadastra.php" name="form" action="/action_page.php" onsubmit="return validarFormulario()">
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
                    onclick="location.href='NacionalidadeLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $n = new Nacionalidade();
            $n->insere($codigo, $nome);

            header('location: NacionalidadeLista.php');
        }
    ?>
</body>
</html>
