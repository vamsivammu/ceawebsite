<?php

require 'connection.php';

session_start();
$resp = array();
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $d = file_get_contents("php://input");
    $dd = json_decode($d);
    @$referred_by = (string)$dd->refer;
    if($referred_by!="Social Media" and $referred_by!="Your friends"){
        $stmt1 = $con->prepare("SELECT * FROM user2019 WHERE ID=?;");
    $stmt1->bind_param("i",$capid);
    $capid = substr($referred_by,6); 
    $capid = (int)$capid;
    $stmt1->execute();
    $stmt1->store_result();
    if($stmt1->num_rows>0){
        $stmt = $con->prepare("UPDATE `user2019`  SET `referred_by`=? WHERE email=?;");
    $stmt->bind_param("ss",$refer,$em);
    $em = $_SESSION['loggeduseremail'];
    $refer=$referred_by;
    if($stmt->execute()){
        $resp['status']=1;
    }else{
        $resp['status'] = -1;
    }
    }else{
        $resp['status'] = 0;
    }
    }else{
        $resp['b'] = $referred_by;
        $resp['c'] = $_SESSION['loggeduseremail'];

        $stmt = $con2->prepare("UPDATE `user2019`  SET `referred_by`=? WHERE email=?;");
        $stmt->bind_param("ss",$refer,$em);
        $em = $_SESSION['loggeduseremail'];
        $refer=$referred_by;
        if($stmt->execute()){
            $resp['status']=1;
        }else{
            $resp['status'] = -1;
        }
    }
    
    

}

if($_SERVER['REQUEST_METHOD']=="VERIFY"){
    $stmt=$con->prepare("SELECT * FROM user2019 WHERE email=?;");
    $stmt->bind_param("s",$email);
    $email=$_SESSION['loggeduseremail'];
    $stmt->execute();
    $a = $stmt->get_result()->fetch_assoc();
    $ref = $a['referred_by'];
    $resp['a']=$ref;
    if($ref!=""){
        $resp['status']=0;

    }else{
        $resp['status'] = 1;
    }
}
echo json_encode($resp);
?>