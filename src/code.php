<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = 'Web Service URL';
$api_key = 'Api Key';


$data = array(
  'Inputs'=> array(
      'input1'=> array(
          'ColumnNames' => array("COLUMN 1", "COLUMN 2", "COLUMN X"),
          'Values' => array( array("VALUE 1", "VALUE 2", "VALUE X"))
      ),
  ),
  'GlobalParameters'=> null
);

$body = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '.$api_key, 'Accept: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//Result content in $response
$response  = json_decode(curl_exec($ch), true);

curl_close($ch);
var_dump ($response);

?>