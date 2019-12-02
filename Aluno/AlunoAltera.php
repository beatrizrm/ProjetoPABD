<!DOCTYPE html>
<?php  include('Aluno.php'); ?>
<html>
<head>
    <title>Altera Aluno</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $a = new Aluno();
            $Aluno = $a->consulta($id); 
            foreach($Aluno as $lst_alun) {
                $nome = $lst_alun->getNocurso();
            } 
        }
    ?>    
    <h1 align="center">Alteração Aluno</h1>    
    <form method="post" action="AlunoAltera.php" >
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
            
            $a = new Aluno();
            $a->altera($nome, $id);

            header('location: AlunoLista.php');
        }
    ?>
</body>
</html>
