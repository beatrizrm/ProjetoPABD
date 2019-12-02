
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Aluno.php'); 
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de Alunos</h1>
            <?php 
                $a = new Aluno(); 
                $lista_aluno = $a->lista();
                foreach($lista_aluno as $lst_alun) { ?>
                <tr>
                    <td><?php echo $lst_alun->getNumatricula(); ?></td>
                    <td><?php echo $lst_alun->getNoaluno();?></td>
                    <td><?php echo $lst_alun->getNocurso();?></td>
                    <td>
                        <a href="AlunoAltera.php?editar=<?php echo $lst_alun->getNumatricula(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="AlunoExclui.php?excluir=<?php echo $lst_alun->getNumatricula(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='AlunoCadastra.php';">Cadastrar Aluno</button>
                </td>
            </tfoot>
        </table>
        <?php
            if (isset($_GET['exclusao'])) {
                if ($_GET['exclusao'] == 0){
                    $msg  = "<p name = 'msg' id='msg' class = 'msg_erro'>";
                    $msg .= "Exclusão não pôde ser realizada.</p>";                  
                    echo $msg;
                }
            }
        ?>       
    </body>
</html>
