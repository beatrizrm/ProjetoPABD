<!DOCTYPE html>
<?php  include('Autor.php'); ?>
<html>
<head>
    <title>Cadastro de Autor</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script>
    function validarFormulario(){
        var nome = document.forms["form"]["nome"].value;
        var codigo = document.forms["form"]["codigo"].value;
        if(nome == "" | codigo == ""){
            alert("Campo Vazio");
            return false;
        }
    }
    </script>
</head>
<body>
    <h1 align="center">Cadastro de Autor</h1>
    <form method="post" action="AutorCadastra.php"name="form" action="/action_page.php" onsubmit="return validarFormulario()"> >
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
                    onclick="location.href='AutorLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $id = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $a = new Autor();
            $a->insere($id, $nome);

            header('location: AutorLista.php');
        }
    ?>
</body>
</html>
