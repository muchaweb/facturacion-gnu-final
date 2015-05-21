<?php 
$cfdi_final = file_get_contents('_generate/cfdi_'.$idFacturacion.'.txt');

$client = new SoapClient('https://www.fiscoclic.mx/factura/WSEntityServices/timbre/TimbraWS?wsdl',
   array('features'=>SOAP_SINGLE_ELEMENT_ARRAYS, 
     'soap_version' => SOAP_1_2,
     'encoding'=>'UTF-8',
     'trace' => 1 ));

  $params = array(
    'cfdi'=> $cfdi_final,
    'user'=>'AAA111111ZZZ',
    'pass'=>'TeStInGfIsCoClIc2012W'
    );

  //TeStInGfIsCoClIc2012Ws

  try {
    $result = $client->timbraCFDIXMLTest($params);
    $taxStamps  = $client->__getLastResponse();
    $var = explode(" ", $taxStamps);


    $tfdTimbre          = "<tfd:TimbreFiscalDigital ".$var[3];
    $uuid               = $var[4];
    $fechaTimbrado      = $var[5];
    $selloCFD           = $var[6];
    $numCertificadoSAT  = $var[7];
    $selloSAT           = $var[8];
    $schemaLocation     = $var[9]." ".$var[10];
    $xmlnsTFD           = $var[11];
    $xmlnsXSI           = $var[12];
}catch (SoapFault $exception) { 

    foreach($operacion as $opDel){
      if($uuid == NULL){

      $deletePreFactura2 = mysql_query("DELETE FROM operacion_cliente WHERE numeroOperacion = '$opDel'") or die(mysql_error());

      echo "<script type='text/javascript'>window.location.href = 'options.php?operacion=no_completada'; </script>";
      

      }
    }
    exit;
  

}
?>