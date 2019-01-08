<?php

require 'connection.php';
session_start();
$resp = array();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $stmt=$con->prepare("SELECT * FROM research WHERE email=?;");
    $stmt->bind_param("s",$email);
    $email = $_SESSION['loggeduseremail'];
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $resp['status'] = 2;
    }else{
        //id
        //name
        //dob
        //gender
        //interest
        //special
        //coll
        //univ
        //grad
        //ug
        //cg
        //city
        //state
        //pincode
        //file
        //email
        //discip
        //gate
        //address
        //phone
        
$stmt2 = $con1->prepare("INSERT INTO research(CEA_ID,firstname,DOB,gender,email,address,city,state,phone,pincode,UG,discipline,
college,univ,cgpa,year,gateappear,ceainterest,specialization,file) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
$stmt2->bind_param("ssssssssssssssssssss",$ceaid,$fname,$dob,$gender,$em,$addr,$city,$sta,$phone,$pinc,$ug,$disc,$coll,$univ,$cg,$yr,$gate,$interest,$spec,$file_name_new);
$ceaid=$_POST['ceaid'];
$fname=$_POST['fname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$em=$_POST['email'];
$addr=$_POST['addr'];
$city=$_POST['city'];
$sta=$_POST['sta'];
$phone=$_POST['phone'];
$pinc=$_POST['pinc'];
$ug=$_POST['ug'];
$disc=$_POST['disc'];
$coll=$_POST['coll'];
$univ=$_POST['univ'];
$cg=$_POST['cg'];
$yr=$_POST['yr'];
$gate=$_POST['gate'];
$interest=$_POST['interest'];
$spec=$_POST['spec'];
$filenam=$_FILES['filenam']['name'];
$filesize=$_FILES['filenam']['size'];
$filetmp=$_FILES['filenam']['tmp_name'];
$file_ext=explode(".",$filenam);
$filerr = $_FILES['filenam']['error'];
$resp['a'] = $ceaid;
$resp['b'] = $filenam;
$resp['c'] = $file_ext;
// $resp['d'] = $ceaid;
// $resp['e'] = $ceaid;
// $resp['f'] = $ceaid;
// $resp['g'] = $ceaid;

        if($file_ext[1]=="pdf"){
 
            if($filesize<2100000 and $filerr==0){
                $file_name_new='CEA19N'.$ceaid.'.'.$file_ext[1];
                $file_dest="events/uploads/".$file_name_new;
                if(move_uploaded_file($filetmp,$file_dest)){
                    if($stmt2->execute()){
                        $resp['status'] = 1;
                    }
                    else{
                        $resp['status'] = -2;
                    }
                }else{
                    $resp['status']=-2;
                }
            }else{
                $resp['status'] = -1;
            }

        }else{
            $resp['status'] = 0;
        }
        
    }

}
echo json_encode($resp);
?>