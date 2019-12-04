<!DOCTYPE html>
<?php  include('Emprestimo.php'); ?>
<html>
<head>
    <title>Altera Emprestimo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script>
    function validarFormulario(){
        var nome = document.forms["form"]["nome"].value;
        if(nome == ""){
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
            
            $n = new Emprestimo();
            $Emprestimo = $n->consulta($id);
            foreach($Emprestimo as $lst_nas) {
                $nome = $lst_nas->getNoEmprestimo();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Emprestimo</h1>    
    <form method="post" action="EmprestimoAltera.php" name="form" action="/action_page.php" onsubmit="return validarFormulario()">
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
            
            $n = new Emprestimo();
            $n->altera($nome, $id);

            header('location: EmprestimoLista.php');
        }
    ?>
</body>
</html>
