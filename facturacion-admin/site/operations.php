<?php 
$concepto = $concepto_original;

$volumen                    =   $volumen_array; //Sumando
$prePPU 					=   ($precioPorUnidadConIVA/(1.16));
$precioPorUnidad      		=   number_format($prePPU,2, '.', '');

$preSubtotal 				=   $prePPU * $volumen;
$subtotal 		      		=   number_format(($preSubtotal),2, '.', '');

$subtotal_final 			= 	$subtotalIVA; //Sumado de subtotales de la bd

$preImporte = $subtotal_final - $preSubtotal;
$importe = number_format($preImporte, 2, '.', '');

$total = number_format($subtotal_final, 2, '.', '');

?>