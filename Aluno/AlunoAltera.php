<!DOCTYPE html>
<?php  include('Aluno.php'); ?>
<html>
<head>
    <title>Altera Aluno</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script>
   function validarFormulario(){
       var nome = document.forms["Form"]["nome"].value;
       if (nome ==""){
           alert("Campo vazio");
           return false;
       }
   } 
    </script>
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $a = new Aluno();
            $Aluno = $a->consulta($id); 
           
        }
    ?>    
    <h1 align="center">Alteração Aluno</h1>    
    <form method="post" action="AlunoAltera.php" name="Form" action="/action_page.php" onsubmit="return validarFormulario()">
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            
            $a = new Aluno();
            $a->altera($nome, $id);

            header('location: AlunoLista.php');
        }
    ?>
</body>
</html>
