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
        <?php
            if (isset($_GET['excluir'])) {
                $id = $_GET['excluir'];
                $n = new Autor();
                $res = $n->exclui($id);

                header('location: AutorLista.php?exclusao='.$resp);
            }
        ?>
    </body>
</html>
