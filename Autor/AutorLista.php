<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Autor.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     
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
            <h1 align="center">Lista de Autor</h1>
            <?php 
                $a = new Autor(); 
                $lista = $a->lista();
                foreach($lista as $lst) { ?>
                <tr>
                    <td><?php echo $lst->getIdAutor(); ?></td>
                    <td><?php echo $lst->getNoAutor();?></td>
                    <td>
                        <a href="AutorAltera.php?editar=<?php echo $lst->getIdAutor(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="AutorExclui.php?excluir=<?php echo $lst->getIdAutor(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='AutorCadastra.php';">Cadastrar Autor</button>
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
