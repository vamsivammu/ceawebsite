<?php

require 'connection.php';
$resp = array();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $d = file_get_contents("php://input");
    $dd = json_decode($d);
    @$em = (string)$dd->email;
    @$n = (string)$dd->name;
    @$ph = (string)$dd->phone;
    @$g = (string)$dd->gender;
    @$p = (string)$dd->password;
    @$cn = (string)$dd->clgname;
    $resp['a'] = $em;
    $resp['b'] = $n;
    
    $stmt = $con->prepare("SELECT * FROM user2019 where email=?;");
    $stmt->bind_param("s",$email);
    $email = $em;
    $stmt->execute();
    
    $s = $stmt->get_result()->fetch_assoc();
    if($s['email']==$email){
        $resp['status']=0;
    }else{
        $stmt1=$con->prepare("INSERT INTO user2019(firstname, phone, college, email, hash_password, conf_code, gender) VALUES(?,?,?,?,?,?,?);");
        $stmt1->bind_param("sssssss",$name,$phone,$college,$email1,$hash_password,$conf_code,$gender);
        $name = $n;
        $phone = $ph;
        $college = $cn;
        $email1= $email;
        $hash_password=sha1($p);
        $conf_code= md5(uniqid(rand()));
        $gender = $g[0];

        if($stmt1->execute()){
            $resp['status']=1;
            $sub="Welcome to CEA 2019";
					$msg4 = '<html><body><div id="email" style="font-family: century gothic;font-size: 16px;">
					<h2>Hi '.$name.',</h2>
					<p>Greetings from CEA-2019 team.</p>
					<p>We are delighted to have you as a registered member.</p>
					<p>Visit the CEA website and login to find all the details about the CEA Fest 2019. </p>
					<p>Please click on the link below to verify your email-id.</p>
					<a href="http://ceaiitm.org/2019/ceawebsite/loginverify?emai='.$email.'&confcode='.$conf_code.'" target="_blank" style="padding: 5px 20px;background: #28b7ed;margin: 20px 40px;color: white;font-size: 25px;text-decoration: none;border-radius:5px;">Verify</a>
					<p style="font-size:12px;">Please ignore this mail if you did not sign up for CEA.</p>					
					<p>Thank you,<br/>
					CEA 2019 Team</p>
					</div></body></html>';
					$headers = "From:CEA Web Operations <webops@ceaiitm.org>\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					//mail($email,$sub,$msg4,$headers);
                    
                }

    }
    
    
}
echo json_encode($resp);


?>
