<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">     
    <title>Altera idioma</title>
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
    
       
        <?php  include('idioma.php'); ?>


<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $c = new idioma();
            $idioma = $c->consulta($id); 
            foreach($idioma as $lst_idioma) {
                $nome = $lst_idioma->getNoidioma();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Idioma</h1>    
    <form method="post" action="IdiomaAltera.php" name="form" action="/action_page.php" onsubmit="return validarFormulario()">
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            
            $c = new idioma();
            $c->altera($nome, $id);

            header('location: idiomaLista.php');
        }
    ?>
    </body>
</html>
