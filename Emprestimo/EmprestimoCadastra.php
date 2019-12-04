
<?php  include('Emprestimo.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realizar Emprestimo</title>
    <script>
    function validarFormulario(){
        var codigo = document.forms["form"]["codigo"].value;
        var aluno = document.forms["form"]["aluno"].value;
        var datae = document.forms["form"]["datae"].value;
        var datad = document.forms["form"]["datad"].value;
        var operador = document.forms["form"]["operador"].value;
        if(codigo =="" | aluno =="" | datae =="" | datad =="" | operador ==""){
            alert("Campo vazio");
            return false;
        }
    }
    </script>
   
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
       
                 <form method="post" action="EmprestimoCadastra.php" id="signup-form" class="signup-form"name="form" action="/action_page.php" onsubmit="return validarFormulario()">
                        <h2>Realizar emprestimo </h2>
                    
         <div class="input-group">
                        <input type="text" class="form-input" name="codigo" id="codigo" placeholder="Código emprestimo"/>
                    </div>
        <div class="input-group">
            <input type="number" class="form-input" name="aluno" id="nomealuno" placeholder="matricula"/>
        </div>
                        <div class="input-group">
                        <input type="date" class="form-input" name="data" id="datae" placeholder="Data Emprestimo"/>
                        </div>
                        <div class="input-group">
                        <input type="date" class="form-input" name="data" id="datad" placeholder="Data Prevista Devolução"/>
                        </div>
                        <div class="input-group">
                        <input type="number" class="form-input" name="operador" id="operador" placeholder="Operador"/>
                    </div>
                       
                
        
            <button class="form-submit submit" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="form-submit submit" name="listar" type="button" 
                    onclick="location.href='EmprestimoLista.php';">Listar
            </button>
        
    </form>
            </div>
        </div>

    

       <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $daemprestimo   = $_POST['datae'];
            $daprevisaodevolucao = $_POST["datad"];
            $idoperador = $_POST["operador"];
            $numatricula = $_POST["aluno"];
                
            
            $e = new Emprestimo();
            $e->insere($id, $daemprestimo, $daprevisaodevolucao, $idoperador, $numatricula);
                    
            header('location: NacionalidadeLista.php');
        }
    ?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>