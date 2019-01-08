<?php

require 'connection.php';
session_start();
$resp = array();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $d = file_get_contents("php://input");
    $dd= json_decode($d);
    @$old = (string)$dd->old;
    @$new = (string)$dd->new;
    @$renew = (string)$dd->renew;

    $stmt = $con->prepare("SELECT * FROM user2019 WHERE email = ?;");
    $stmt->bind_param("s",$email);
    $email = $_SESSION['loggeduseremail'];
    $stmt->execute();
    $a = $stmt->get_result()->fetch_assoc();
    $hashed = $a['hash_password'];
    $hashfromuser = sha1($old);
    if($hashed==$hashfromuser){
        $stmt1 = $con->prepare("UPDATE `user2019` SET `hash_password`=? WHERE email=?; ");
        $stmt1->bind_param("ss",$hp,$em);
        $hp = sha1($new);
        $em = $email;
        if($stmt1->execute()){
            $resp['status']=1;
        }
        else{
            $resp['status']=0;
        }
    }
}

echo json_encode($resp);
?>