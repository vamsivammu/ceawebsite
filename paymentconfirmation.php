<?php

require 'connection.php';
session_start();
header('Access-Control-Allow-Origin: https://www.thecollegefever.com/');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
$resp=array();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $d = file_get_contents("php://input");
    $dd = json_decode($d);
    @$ticketname = (string)$dd->TicketName;
    @$amount = (string)$dd->amount;
    @$email = (string)$dd->email;
    @$tickid = (string)$dd->ticket_id;
    @$name = (string)$dd->name;
    if($ticketname=="Passport"){
        $stmt = $con->prepare("UPDATE `user2019` SET `transaction`=? WHERE email=?;");
        $stmt->bind_param("is",$t,$em);
        $t = 1;
        $em = $_SESSION['loggeduseremail'];
        if($stmt->execute()){
            header("Location:https://ceaiitm.org/2019/ceawebsite/profile");
        }

    }


}



?>