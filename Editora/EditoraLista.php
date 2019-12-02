<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Editora.php'); ?>
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
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de Editoras</h1>
            <?php 
                $e = new Editora(); 
                $lista_editora = $e->lista();
                foreach($lista_editora as $lst_ed) { ?>
                <tr>
                    <td><?php echo $lst_ed->getIdeditora(); ?></td>
                    <td><?php echo $lst_ed->getNoeditora();?></td>
                    <td>
                        <a href="EditoraAltera.php?editar=<?php echo $lst_ed->getIdeditora(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="EditoraExclui.php?excluir=<?php echo $lst_ed->getIdeditora(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='EditoraCadastra.php';">Cadastrar Curso</button>
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
