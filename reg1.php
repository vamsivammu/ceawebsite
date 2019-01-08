<?php

require 'connection.php';

$resp=array();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $d= file_get_contents("php://input");
    $dd=json_decode($d);
    @$em = (string)$dd->em;
    $stmt = $con->prepare("SELECT * FROM user2019 WHERE email=?;");
    $stmt->bind_param("s",$email);
    $email=$em;
    $stmt->execute();
    $a = $stmt->get_result()->fetch_assoc();
    if($a['email']==$email){
        $resp['status']=0;
    }else{
        $resp['status']=1;
    }
}

echo json_encode($resp);
?>