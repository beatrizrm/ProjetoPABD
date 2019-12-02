<!DOCTYPE html>
<?php  include('Operador.php'); ?>
<html>
<head>
    <title>Altera Operadores</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $c = new Operador();
            $Operador = $c->consulta($id); 
            foreach($Operador as $lst_Operador) {
                $nome = $lst_Operador->getNoOperador();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Operador</h1>    
    <form method="post" action="OperadorAltera.php" >
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
            
            $c = new Operador();
            $c->altera($nome, $id);

            header('location: OperadorLista.php');
        }
    ?>
</body>
</html>

