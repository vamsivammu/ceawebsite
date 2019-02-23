<?php
header('Access-Control-Allow-Origin: http://localhost');

require 'connection.php';
session_start();

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
$resp=array();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $d = file_get_contents("php://input");
    $dd = json_decode($d);
    @$amount = (string)$dd->amount;
    @$tickid = (string)$dd->ticket_id;

    @$ticketitems = $dd->ticketids;
    $resp['a'] = $ticketitems;
    $resp['b'] = $tickid;
    $resp['c'] = $amount;

    foreach($ticketitems as $ticketitem){
        // $resp['d'] = $ticketitem->name;
        // $resp['d'] = $mm;
        $name = (string)$ticketitem->name;
        
    }

}

echo json_encode($resp);

?>