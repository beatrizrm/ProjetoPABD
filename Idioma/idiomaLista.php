<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php  include('idioma.php'); ?>
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
            <h1 align="center">Lista de Idioma</h1>
            <?php 
                $c = new idioma(); 
                $lista_idioma = $c->lista();
                foreach($lista_idioma as $lst_idioma) { ?>
                <tr>
                    <td><?php echo $lst_idioma->getIdidioma(); ?></td>
                    <td><?php echo $lst_idioma->getNoidioma() ?></td>
                    <td>
                        <a href="idiomaAltera.php?editar=<?php echo $lst_idioma->getIdidioma(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="idiomaExclui.php?excluir=<?php echo $lst_idioma->getIdidioma(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='idiomaCadastrar.php';">Cadastrar Idioma</button>
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
