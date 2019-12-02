
<?php  include('Emprestimo.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realizar Emprestimo</title>
   
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
       
                 <form method="post" action="CursoCadastra.php" id="signup-form" class="signup-form" >
                        <h2>Cadastrar Curso</h2>
                    <p class="desc">alguma coisa <span>“”</span></p>
         <div class="input-group">
                        <input type="text" class="form-input" name="codigo" id="codigo" placeholder="Código do curso"/>
                    </div>
        <div class="input-group">
                            <input type="text" class="form-input" name="nome" id="name" placeholder="Nome do curso"/>
                        </div>
        <div class="form-group">
            <button class="form-submit submit" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="form-submit submit" name="listar" type="button" 
                    onclick="location.href='CursoLista.php';">Listar
            </button>
        </div>
    </form>
            </div>
        </div>

    </div>

       <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $c = new Curso();
            $c->insere($codigo, $nome);

            header('location: CursoLista.php');
        }
    ?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>