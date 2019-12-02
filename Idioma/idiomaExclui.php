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
    </head>
    <body>
        <?php
            if (isset($_GET['excluir'])) {
                $codigo = $_GET['excluir'];
            
                $c = new idioma();
                $resp = $c->exclui($codigo);

                header('location: idiomaLista.php?exclusao='.$resp);
            }
        ?>

    </body>
</html>
