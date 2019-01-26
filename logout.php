<?php

require 'connection.php';
$resp=array();
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_SESSION['loggeduseremail'])){
        unset($_SESSION['loggeduseremail']);
            
        $resp['status']=1;
            
        
    }
}
echo json_encode($resp);
?>