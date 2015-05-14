<?php 
header("access-control-allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");

session_start();

include('lib/connect.php');

$link = Connect();

// Obtengo los datos del formulario -- ambos serán obligatorios
// Todo se buscará en base al rfc
// El email será referencia a donde se mandará la factura
$rfc    = $_POST['rfc'];
$email  = $_POST['email'];

$access = mysql_query("SELECT * FROM clientes WHERE rfc ='$rfc' LIMIT 1") or die(mysql_error());

if ($row= mysql_fetch_array($access)) {
        $_SESSION['id']             =   $row['id_cliente'];
        $_SESSION['rfc']            =   $row['rfc'];
        $_SESSION['status']         =   "in";   
        $_SESSION['fecha_usuario']  =   date("Y-n-j");
        $_SESSION['email_init']     =   $email;

        header("Location:site/options.php");
    }else {
        header("Location:site/new_client.php");
    } 

?>