<?php

    require 'connection.php';
$resp= array();
    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $d = file_get_contents("php://input");
        $dd= json_decode($d);
        @$nm = (string)$dd->name;
        @$clgname = (string)$dd->clgname;
        @$mob = (string)$dd->phone; 
        $stmt= $con->prepare("UPDATE `user2019` SET `firstname`=? ,`phone`=? ,`college`=? WHERE `email`=?;");
        $resp['n']= $nm;
        $resp['o']= $clgname;
        $resp['p']= $mob;
        
        $stmt->bind_param("ssss",$name,$phone,$clg,$email);
        $name = $nm;
        $phone = $mob;
        $clg = $clgname;
        $email = $_SESSION['loggeduseremail'];
        if($stmt->execute()){
            $resp['status'] = 1;
        }else{
            $resp['status'] = 0;
        }
    }

echo json_encode($resp);

?>