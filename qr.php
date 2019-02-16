<?php

session_start();
include('config2.php');
include('qrcode/qrlib.php');

$stmt =  $con->prepare("SELECT * FROM user2019 WHERE email=?;");
$stmt->bind_param("s",$email);
$email = $_SESSION['loggeduseremail'];
$stmt->execute();
$a = $stmt->get_result()->fetch_assoc();

$stmt2 = $con1->prepare("SELECT * FROM userpayment WHERE CEAID=?;");
$stmt2->bind_param("s",$ceaid);
$ceaid= "CEA19N".$a['ID'];
$stmt2->execute();
$b = $stmt2->get_result()->fetch_assoc();

$festpayment = 'Not Paid';
$staadpro = 'Not Paid';
// $air = 'Not Paid';
$accpay = 0;

if($b['festfee']==300){
    $festpayment="Paid";
}
if($b['staadpro']==500){
    $staadpro = "Paid";
}
// if($b['air']==500){
//     $air = "Paid";
}
if($b['accomodation']!=0){
    $accpay = $b['accomodation'];

}
$out='Name: '.$a['firstname']."\n".'CEA ID: '.$ceaid."\n".'College: '.$a['college']."\n".'Events Registered: '.$a['events']."\n".'Workshops Registered: '.$a['workshops']."\n".'Fest Payment: '.$festpayment."\n".'Staad Pro Workshop: '.$staadpro."\n".'Accomodation Payment: '.$accpay."\n";
$direc = __DIR__;
$abs = $direc."/qrs/qr_".$a['ID'].".png";
QRcode::png($out,$abs);        

?>