<?php

require 'connection.php';
$resp= array();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // $stmt1=$con1->prepare("INSERT INTO newuser2019(firstname, phone,college, email, gender) VALUES(?,?,?,?,?);");
    // $stmt1->bind_param("sssssss",$name,$phone,$college,$email1,$gender);
    // $name = "vamsi";
    // $phone = "9999999999";
    // $college = "test";
    // $email1= "test@test.testestttttttt";
    // $hash_password=sha1("V@ms!3235");
    // $conf_code= md5(uniqid(rand()));
    // $gender = "M";
   $stmt1 = $con->prepare("INSERT INTO testinsert(name) VALUES(?);");
   $stmt1->bind_param("s",$name);
   $name   = "vamsi";
    if($stmt1->execute()){
        $resp['status'] = 1;
    }else{
        $resp['status'] = 0;
    }
}
echo json_encode($resp);


?>