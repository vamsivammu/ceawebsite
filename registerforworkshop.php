<?php

session_start();
$resp=array();
require 'connection.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $d = file_get_contents("php://input");
    $dd=json_decode($d);
    @$yr = (string)$dd->yr;
    @$stream = (string)$dd->stream;
    @$regwork = (string)$dd->workshops;
    @$curwork=(string)$dd->curwork;
    @$idd = (string)$dd->id;
    $exists1 = strpos($regwork, $curwork);
    if($exists1!==false){
        $resp['status'] =-1;

    }else{
        
        $stmt=$con->prepare("SELECT * FROM events WHERE event=?;");
        $stmt->bind_param("s",$ev);
        $ev = $curwork;
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows()<100){
            $stmt2 = $con2->prepare("INSERT INTO events (event,captain,vicecaptain,3rdmem)  VALUES(?,?,?,?);");
            $stmt2->bind_param("ssss",$eve,$capid,$yer,$stre);
            $eve = $curwork;
            $capid=$idd;
            $yer = $yr;
            $stre = $stream;
            
            $stmt3 = $con1->prepare("UPDATE `user2019` SET `workshops`=? WHERE ID=?;");
            $stmt3->bind_param("si",$even,$ii);
            $even = $regwork.','.$curwork;
            $ii = (int)$idd;

            if($stmt2->execute() and $stmt3->execute()){
                $resp['status'] = 1;

            }else{
                $resp['status'] =0;
            }
                
        }else{
            $resp['status']  = -2;
        }

    }
    

}
echo json_encode($resp);

?>