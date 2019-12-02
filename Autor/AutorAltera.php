<!DOCTYPE html>
<?php  include('Autor.php'); ?>
<html>
<head>
    <title>Altera Autor</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $a = new Autor();
            $autor = $a->consulta($id); 
            foreach($autor as $lst_autor) {
                $nome = $lst_autor->getNoAutor();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Autor</h1>    
    <form method="post" action="AutorAltera.php" >
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
            
            $c = new Autor();
            $c->altera($nome, $id);

            header('location: AutorLista.php');
        }
    ?>
</body>
</html>
