<?php
require 'connection.php';
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
$resp=array();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $d = file_get_contents("php://input");
    $dd = json_decode($d);
    @$a = (string)$dd->name;
    @$b = (string)$dd->pass;
    $resp['a'] = $a;
    $resp['b'] = $b;

}
echo json_encode($resp);

?>