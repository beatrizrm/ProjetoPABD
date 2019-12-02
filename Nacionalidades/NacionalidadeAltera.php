<!DOCTYPE html>
<?php  include('Nacionalidade.php'); ?>
<html>
<head>
    <title>Altera Nacionalidade</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $n = new Nacionalidade();
            $nacionalidade = $n->consulta($id);
            foreach($nacionalidade as $lst_nas) {
                $nome = $lst_nas->getNonacionalidade();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Nacionalidade</h1>    
    <form method="post" action="NacionalidadeAltera.php" >
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
            
            $n = new Nacionalidade();
            $n->altera($nome, $id);

            header('location: NacionalidadeLista.php');
        }
    ?>
</body>
</html>
