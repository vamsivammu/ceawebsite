<?php

require 'connection.php';
$resp= array();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $stmt = $con->prepare("INSERT INTO testinsert(name) VALUES(?);");
    $stmt->bind_param("s",$n);
    $n = "vamsi";
    if($stmt->execute()){
        $resp['status'] = 1;
    }
}
echo json_encode($resp);


?>