<?php 
include('../lib/phpqrcode/qrlib.php');

$num = explode(".", $total);
$entero = mb_strlen($num[0]);
 
$limit = 10 - $entero;

for($i=0;  $i < $limit; $i++){

	$num[0] = '0'.$num[0];

}
$tt = $num[0].".".$num[1]."0000";

$qr_string = "?re=EGA100902M13&rr=".strtoupper($rfc)."&tt=".$tt."&id=".$uuid[1]."";

QRcode::png($qr_string, '../img/qr_codes/qr_code_'.$idFacturacion_folio.'.png', QR_ECLEVEL_L, 180);


?>