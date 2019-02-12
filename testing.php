<?php
require 'connection.php';
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