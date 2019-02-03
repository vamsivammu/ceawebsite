<?php

    require 'connection.php';
    session_start();
    $resp=array();
    $stus = array();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $d = file_get_contents("php://input");
        $dd = json_decode($d);
        @$mem1 = (string)$dd->mem1;
        @$mem2 = (string)$dd->mem2;
        @$mem3 = (string)$dd->mem3;
        @$mem4 = (string)$dd->mem4;
        @$mem5 = (string)$dd->mem5;
        array_push($stus,$mem1);
        array_push($stus,$mem2);
        array_push($stus,$mem3);
        array_push($stus,$mem4);
        array_push($stus,$mem5);
        
        @$event = (string)$dd->event;
        $stmt1 = $con->prepare("SELECT * FROM user2019 WHERE ID=?;");
        $stmt1->bind_param("i",$mem1id);
        $stmt2 = $con->prepare("SELECT * FROM user2019 WHERE ID=?;");
        $stmt2->bind_param("i",$mem2id);
        $stmt3 = $con->prepare("SELECT * FROM user2019 WHERE ID=?;");
        $stmt3->bind_param("i",$mem3id);
        $stmt4 = $con->prepare("SELECT * FROM user2019 WHERE ID=?;");
        $stmt4->bind_param("i",$mem4id);
        $stmt5 = $con->prepare("SELECT * FROM user2019 WHERE ID=?;");
        $stmt5->bind_param("i",$mem5id);
        
        $mem1id= (int)substr($mem1,6);
        $mem2id= (int)substr($mem2,6);
        $mem3id= (int)substr($mem3,6);
        $mem4id= (int)substr($mem4,6);
        $mem5id= (int)substr($mem5,6);

        $stmt1->execute();
        $mem1det = $stmt1->get_result()->fetch_assoc();

        $stmt2->execute();
        $mem2det = $stmt2->get_result()->fetch_assoc();
        
        $stmt3->execute();
        $mem3det = $stmt3->get_result()->fetch_assoc();
        
        $stmt4->execute();
        $mem4det = $stmt4->get_result()->fetch_assoc();
        
        $stmt5->execute();
        $mem5det = $stmt5->get_result()->fetch_assoc();
        
        $s1 = strpos($mem1det['events'],$event);
        $s2 = strpos($mem2det['events'],$event);
        $s3 = strpos($mem3det['events'],$event);
        $s4 = strpos($mem4det['events'],$event);
        $s5 = strpos($mem5det['events'],$event);

        if(($mem1id!=$mem1det['ID']) or ($mem4id!=$mem4det['ID']) or ($mem5id!=$mem5det['ID']) or ($mem2id!=$mem2det['ID']) or ($mem3id!=$mem3det['ID'])){
            $resp['status']=-3;
        }else{
        if (($s1 !== false) or ($s2 !== false) or ($s3 !== false) or ($s4 !== false) or ($s5 !== false) ){
                        
            $resp['status']  = -1;

        }else{

            $upd1 = $con1->prepare("UPDATE `user2019` SET `events`=? WHERE ID=?;");
            $upd1->bind_param("si",$m1eve,$m1id);
            $m1id = $mem1id;
            $m1eve = $mem1det['events'].','.$event;

            $upd2 = $con1->prepare("UPDATE `user2019` SET `events`=? WHERE ID=?;");
            $upd2->bind_param("si",$m2eve,$m2id);
            $m2id = $mem2id;
            $m2eve = $mem2det['events'].','.$event;

            
            $upd3 = $con1->prepare("UPDATE `user2019` SET `events`=? WHERE ID=?;");
            $upd3->bind_param("si",$m3eve,$m3id);
            $m3id = $mem3id;
            $m3eve = $mem3det['events'].','.$event;

            
            $upd4 = $con1->prepare("UPDATE `user2019` SET `events`=? WHERE ID=?;");
            $upd4->bind_param("si",$m4eve,$m4id);
            $m4id = $mem4id;
            $m4eve = $mem4det['events'].','.$event;

            
            $upd5 = $con1->prepare("UPDATE `user2019` SET `events`=? WHERE ID=?;");
            $upd5->bind_param("si",$m5eve,$m5id);
            $m5id = $mem5id;
            $m5eve = $mem5det['events'].','.$event;

            $eveins = $con2->prepare("INSERT INTO events (event,captain,vicecaptain,3rdmem,4thmem,5thmem)  VALUES(?,?,?,?,?,?);");
            $eveins->bind_param("ssssss",$evename,$m1,$m2,$m3,$m4,$m5);
            $evename = $event;
            $m1 = (string)$m1id;
            $m2 = (string)$m2id;
            $m3 = (string)$m3id;
            $m4 = (string)$m4id;
            $m5 = (string)$m5id;
            
                        
            $resp['a'] = $m1;
            $resp['b'] = $m2;
            $resp['c'] = $m3;
            $resp['d'] = $m4;
            $resp['e'] = $m5;
            $resp['f'] = $evename;
            $resp['g'] = $m1eve;
            $resp['h'] = $m2eve;
            $resp['i'] = $m3eve;
            $resp['j'] = $m4eve;
            $resp['k'] = $m5eve;
            
            
            if($upd1->execute() and $upd2->execute() and $upd3->execute() and $upd4->execute() and $upd5->execute() and $eveins->execute()){
               $resp['status'] = 1;

            }else{
                $resp['status'] =0;
            }
            
            


        }
    }

    }


echo json_encode($resp);
?>

