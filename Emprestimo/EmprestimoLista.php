<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Emprestimo.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <!--Icon -->
    <link rel="icon" type="image/icon" href="images/icon.png"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
     <!--Icon -->
    <link rel="icon" type="image/icon" href="images/icon.png"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
   <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="main">
            <div class="container">
            <div class="signup-content">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Aluno</th>
                    <th>Operador</th>
                    <th>Data Prevista Devolução</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Emprestimos</h1>
            <?php 
                $e = new Emprestimo(); 
                $lista = $e->lista();
                
                foreach($lista as $lst_empre) { ?>
            
            <tr class="container">
                
                <td class="form-group submit"><?php echo $lst_empre->getIdemprestimo(); ?></td>
                <td class="form-group submit"><?php echo $lst_empre->getNuMatricula(); ?></td>
                    <td class="form-group submit"><?php echo $lst_empre->getDaPrevisaoDevolucao();?></td>
                    <td class="form-group submit"><?php echo $lst_empre->getNooperador();?></td>
                    <td>
                        <a href="EmprestimoAltera.php?editar=<?php echo $lst_empre->getIdemprestimo(); ?>" class="form-submit submmit">Alterar</a>
                    </td>
                    <td>
                        <a href="EmprestimoExclui.php?excluir=<?php echo $lst_empre->getIdemprestimo(); ?>" 
                           class="form-submit subimit">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            
        </table>
            </div>
            </div>
            </div>
        
        <?php
            if (isset($_GET['exclusao'])) {
                if ($_GET['exclusao'] == 0){
                    $msg  = "<p name = 'msg' id='msg' class = 'msg_erro'>";
                    $msg .= "Exclusão não pôde ser realizada.</p>";                  
                    echo $msg;
                }
            }
        ?>    
         <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
