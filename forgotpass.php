<?php
require 'connection.php';
$resp= array();
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $d = file_get_contents("php://input");
    $dd = json_decode($d);

    @$em = $dd->email;

    $stmt= $con->prepare("SELECT * FROM user2019 WHERE email=?;");
    $stmt->bind_param("s",$email);
    $email = $em;
    $stmt->execute();
    $a = $stmt->get_result()->fetch_assoc();
    if($a['email']==$email){
        $newpas= sha1(rand());
    	$newpass=substr($newpas,0,10);
        $fname = $a['firstname'];
        
        $stmt1 = $con->prepare("UPDATE `user2019` SET `hash_password`=? WHERE email=?;");
        $stmt1->bind_param("ss",$hash_newpass,$emai);
        $emai = $email;
        $hash_newpass=sha1($newpass);
        
    	if($stmt1->execute()){
    	$fname=$results['firstname'];
    	$sub="CEA 2019 Login Password";
    	$body='<html><body><div id="email" style="font-family: century gothic;font-size: 16px;">
    	Hello '.$fname.', Your CEA login password has been changed to '.$newpass.'
    	<br/>Please  change your password once you login</div></body></html>';
    	$headers = "From:CEA Web Operations <webops@ceaiitm.org>\r\n";
    	$headers .= "MIME-Version: 1.0\r\n";
    	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    	if(mail($email,$sub,$body,$headers)){
    					$resp['status'] = 1;
                        
                    }
    					else
    					{
                            $resp['status'] = 0;
                        
    					}
    }

}
else{
    $resp['status'] = -1;
}
}
echo json_encode($resp);
?>