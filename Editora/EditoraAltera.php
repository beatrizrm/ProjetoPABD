<!DOCTYPE html>
<?php  include('Editora.php'); ?>
<html>
<head>
    <title>Altera Editora</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $e = new Editora();
            $editora = $e->consulta($id); 
            foreach($editora as $lst_ed) {
                $nome = $lst_ed->getNoeditora();
            } 
        }
    ?>    
    <h1 align="center">Alteração Editora</h1>    
    <form method="post" action="EditoraAltera.php" >
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
            
            $c = new Editora();
            $c->altera($nome, $id);

            header('location: EditoraLista.php');
        }
    ?>
</body>
</html>
