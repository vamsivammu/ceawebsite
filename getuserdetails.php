<?php

require 'connection.php';
session_start();
// include 'qr.php';
$resp=array();
if($_SERVER['REQUEST_METHOD']=="POST"){

    $stmt= $con->prepare("SELECT * FROM user2019 WHERE email=?;");
    $stmt->bind_param("s",$email);
    $email = $_SESSION['loggeduseremail'];
    $stmt->execute();
    $a = $stmt->get_result()->fetch_assoc();    
    $id = $a['ID'];
    $name = $a['firstname'];
    $phone = $a['phone'];
    $clgname = $a['college'];
    $gender = $a['gender'];
    $resp['id']=$id;
    $resp['name']=$name;
    $resp['phone']=$phone;
    $resp['clgname']=$clgname;
    $resp['gender']=$gender;
    $resp['email']=$email;
    $resp['workshops'] = $a['workshops'];
    $resp['regisevents'] = $a['events'];
    $stmt2 = $con1->prepare("SELECT * FROM userpayment WHERE email=?;");
    $stmt2->bind_param("s",$e);
    $e = $email;
    $stmt2->execute();
    $b = $stmt2->get_result()->fetch_assoc();
    $resp['payment'] = $b['payment'];
    $resp['structural'] = $b['structural'];
    $resp['festfee'] = $b['festfee'];
    $resp['accomodation'] = $b['accomodation'];
    $resp['air'] = $b['air'];
    $resp['verified1'] = $b['verified1'];
    $resp['days'] = $b['days'];
    

}


echo json_encode($resp);

?>