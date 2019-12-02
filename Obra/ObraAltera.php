<!DOCTYPE html>
<?php  include('Obra.php'); ?>
<html>
<head>
    <title>Altera Obra</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $c = new Obra();
            $obra = $c->consulta($id); 
            foreach($obra as $lst_obra) {
                $nome = $lst_obra->getNoobra();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Obras</h1>    
    <form method="post" action="ObraAltera.php" >
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
            
            $c = new Obra();
            $c->altera($nome, $id);

            header('location: ObraLista.php');
        }
    ?>
</body>
</html>
