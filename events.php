<?php

require 'connection.php';
$resp = array();
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $stmt = $con->prepare("SELECT * FROM eventscontent;");
    $stmt->execute();
    $a = $stmt->get_result();
    while($s=$a->fetch_assoc()){
        $event = array();
        $event['id']=$s["ID"];
        $event['event']=$s['event'];
        
        $event['introduction']=$s['introduction'];
        $event['format']=$s['format'];
        $event['contact']=$s['contact'];
        $event['problem']=$s['problem'];
        $event['rules']=$s['rules'];
        $event['faqs']=$s['faqs'];
        array_push($resp,$event);
    }
}
echo json_encode($resp);

?>