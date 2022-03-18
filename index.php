<?php
    include "bibliotecas/parametros.php";
    include "bibliotecas/conexao.php";
 
    include LAYOUTS.'header.php';
 
    include LAYOUTS.'menu.php';
 
    if (!isset($_GET['pagina']))
        include LAYOUTS.'home.php';
    else
        include CADASTROS.$_GET['modulo'].'/'.$_GET['pagina'].'.php';
   
    include LAYOUTS.'footer.php';