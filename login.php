<?php

require 'connection.php';
$resp=array();
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){

    $d = file_get_contents("php://input");
    $dd = json_decode($d);
    @$em = (string)$dd->logmail;
    @$pas = (string)$dd->password;
    $stmt = $con->prepare("SELECT * FROM user2019 WHERE email=?;");
    $stmt->bind_param("s",$email);
    $email=$em;
    $stmt->execute();

    $s = $stmt->get_result()->fetch_assoc();
    if($email==$s["email"]){
        if($s['hash_password']==sha1($pas)){
            $resp['status']=1;
            $_SESSION['loggeduseremail']=$email;
        }else{
            $resp['pass']=$pas;
            // $resp['hp']=$s['hash_password'];
            $resp['status']=-1;
        }
    }else{
        $resp['status']=0;
    }
}

if($_SERVER['REQUEST_METHOD']=="VERIFY"){
    $det=file_get_contents("php://input");
    $ddet= json_decode($det);
    @$vem = (string)$ddet->email;
    @$cc = (string)$ddet->confcode;
    $resp['cc']=$cc;
    $resp['vem'] = $vem;
    $stmt = $con->prepare("SELECT * FROM user2019 WHERE email=?;");
    $stmt->bind_param("s",$e);
    $e = $vem;
    $stmt->execute();
    $r = $stmt->get_result()->fetch_assoc();
    if($r['conf_code']==$cc){
        $stmt2=$con->prepare("UPDATE `user2019` SET `confirmed`=? WHERE email=?;");
        $stmt2->bind_param("is",$confirmed,$ee);
        $ee = $vem;
        $confirmed = 1;
        if($stmt2->execute()){
            $resp['statuss'] = 1;

        }else{
            $resp['statuss']=0;
        }
    }
}

echo json_encode($resp);
?>