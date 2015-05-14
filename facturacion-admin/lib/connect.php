<?php
function Connect()
{
    if (!($link=mysql_connect("192.168.1.69","root","berna"))) {
        echo "Error conectando a la base de datos.";
        exit();
    }

    if (!mysql_select_db("gnu_v3",$link)){
        echo "Error seleccionando la base de datos.";
        exit();
    }
    return $link;
}

$link = Connect();
mysql_close($link);
?>