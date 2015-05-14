<?php   
/*error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);*/

date_default_timezone_set('America/Mexico_City');
/*error_reporting(0);*/

function Connect(){
  if (!($link=mysql_connect("localhost","root","berna"))) {
  echo "Error conectando a la base de datos.";
  exit();
  }

  if (!mysql_select_db("gnu_v3",$link)){
  echo "Error seleccionando la base de datos.";
  exit();
  }
  return $link;
  }
  mysql_query("SET names UTF8");
  $link=Connect();

  mysql_close($link);
  ?>