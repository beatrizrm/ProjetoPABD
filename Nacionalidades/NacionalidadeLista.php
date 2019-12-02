<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Nacionalidade.php'); ?>
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
            <h1 align="center">Lista de Nacionalidade</h1>
            <?php 
                $n = new Nacionalidade(); 
                $lista_nacionalidade = $n->lista();
                foreach($lista_nacionalidade as $lst_nasc) { ?>
                <tr>
                    <td><?php echo $lst_nasc->getIdnacionalidade(); ?></td>
                    <td><?php echo $lst_nasc->getNonacionalidade(); ?></td>
                    <td>
                        <a href="NacionalidadeAltera.php?editar=<?php echo $lst_nasc->getIdnacionalidade() ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="NacionalidadeExclui.php?excluir=<?php echo $lst_nasc->getIdnacionalidade() ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='NacionalidadeCadastra.php';">Cadastrar Nacionalidade</button>
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
