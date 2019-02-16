<?php 
    session_start();
    include('config2.php');
    // setcookie('userdata[authID]', '', -3600, '', '', '', true);
    // setcookie('userdata[user]', '', -3600, '', '', '', true);
    $link= mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,"userinfo");
    if(!$link)
    {
        die('Could not Connect:'.mysql_error());
    }
    $db_selected=mysql_select_db("userinfo", $link);
    $useremail = $_SESSION['loggeduseremail'];
    // if(empty($useremail))
    // {
    //     $_SESSION['message'] = "please login to enter your profile";
    //     header('Location:login.php');
    // }
    $sql= "SELECT * FROM user2019 WHERE email = '$useremail'";
	$results = mysql_query($sql);
	$results=mysql_fetch_assoc($results);
	
	$nameErr = $collegeErr = $phoneErr = $msg = $passworderr1 = $passworderr2 = $eventsErr = $workshopsErr = $researchErr = $transErr = $updateprofileErr = $CAErr = $CAmsg = NULL;
	$capname = $vicecapname = $thirdmemname = $fourthmemname = $fifthmemname = NULL;
    $name = $results['firstname'];
    $college = $results['college'];
    $phone = $results['phone'];
    $CEAID = "CEA19N".$results['ID'];
    
    // setcookie('userid', $results['ID'], "/");
    
    $sql22= "SELECT * FROM userpayment WHERE CEAID = '$CEAID'";
	$paymenttest = mysql_query($sql22);
	$paymenttest=mysql_fetch_assoc($paymenttest);
	
	
############################# Transaction details ##############################

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submittrans']))
    {
        $trans = $_POST['trans'];
        if(empty($_POST['trans'])) 
        {
            $transErr = "please Enter the transaction ID";
        }
        if(strlen($trans)<10)
        {
            $transErr = "please Enter a proper transaction ID";
        }
        if(empty($transErr) and strcmp($results['transaction'],'0')==0)
        {
            $sql1="UPDATE user2019 SET transaction='$trans' WHERE email='$useremail'";
            $r11=mysql_query($sql1);
            if($r11)
            {
                $transmsg = "Your response is recorded Thank you";
                header('refresh:0');                            
            }
            else
            {
                $msg = '<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:200px;" data-notify="container">
                    <div class="container">
                    <div class="alert-wrapper">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <div class="message"><i class="nc-icon nc-bell-55"></i>Error</div>
                    </div>
                </div>
                </div>';
            }
        }
    }
}

############################# CA feedback ##############################

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submitca']))
    {
        $attend = $_POST['attend'];
        $q1 = $_POST['q1'];
        $caname = $_POST['caname'];
        if(empty($_POST['q1'])) 
        {
            $CAErr = "Answer all question";
        }
        if(empty($_POST['attend'])) 
        {
            $CAErr = "Answer all question";
        }
        if($q1 == 'ca' and empty($_POST['caname']))
        {
            $CAErr = "please enter the proper name";
        }
        if (!empty($caname) and !preg_match("/^[a-zA-Z ]*$/",$caname)) 
        {
            $CAErr = "Only letters and white space allowed for name"; 
        }
        if(empty($CAErr) and $results['CA']==0)
        {
            $id = "CEA19N".$results['ID'];
            $sql = "INSERT INTO CA_questions (ID,attend,q1,CA_Name)  values('$id','$attend','$q1','$caname')";
            $r1= mysql_query($sql);
            $sql1="UPDATE user2019 SET CA='1' WHERE email='$useremail'";
            $r11=mysql_query($sql1);
            
            
            if($r1 and $r11)
            {
                $CAmsg = "Thank you for your valuable feedback";
                header('refresh:0');                            
            }
            else
            {
                $msg = '<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:200px;" data-notify="container">
                    <div class="container">
                    <div class="alert-wrapper">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <div class="message"><i class="nc-icon nc-bell-55"></i>Error</div>
                    </div>
                </div>
                </div>';
            }
        }
    }
}
        

############################# edit profile ############################
    
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submit1']))
    {
        $name = $_POST['name'];
        $college = $_POST['college'];
        $phone = $_POST['phone'];
        if(empty($_POST['name'])) 
        {
            $updateprofileErr = "* Name is required";
        }
        if(empty($_POST['college'])) 
        {
            $updateprofileErr = "* College name is required";
        }
        if(empty($_POST['phone']))
        {
            $updateprofileErr = "* Phone no. is required";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
        {
            $updateprofileErr = "Only letters and white space allowed"; 
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$college)) 
        {
            $updateprofileErr = "Only letters and white space allowed"; 
        }
        if(!preg_match('/^[0-9]{10}$/', $_POST['phone']))
        {
            $updateprofileErr = 'Invalid Number!';
        }
        $file=$_FILES['profilephoto'];
    	$file_name=$file['name'];
    	$file_tmp=$file['tmp_name'];
    	$file_size=$file['size'];
    	$file_error=$file['error'];
    	$file_ext=explode(".",$file_name);
    	$file_ext=strtolower(end($file_ext));
    	if($file_ext=="jpg" or !file_exists($_FILES['profilephoto']['tmp_name']))
    	{
    	    if(($file_error===0 and ($file_size < 2100000)) or !file_exists($_FILES['profilephoto']['tmp_name']))
        	{
        		$file_name_new='CEA19N'.$results['ID'].'.'.$file_ext;
        		$file_dest="images/profilePics/".$file_name_new;
        	    if(move_uploaded_file($file_tmp,$file_dest) or !file_exists($_FILES['profilephoto']['tmp_name']))
        		{
        		    if(empty($nameErr) and empty($collegeErr) and empty($phoneErr))
                    {
                        $q1="UPDATE user2019 SET firstname='$name', college='$college', phone='$phone' WHERE email='$useremail'";
                		$r1=mysql_query($q1);
                		if($r1)
                		{
                		    $msg = '<br><div class="alert alert-success alert-with-icon" style="margin:auto; width:30%; min-width:350px;" data-notify="container">
                                <div class="container">
                                    <div class="alert-wrapper">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <div class="message"><i class="nc-icon nc-bell-55"></i>successfully updated your profile</div>
                                    </div>
                                </div>
                            </div>';
                            
                        }
                        else
                        {
                            $msg = '<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:200px;" data-notify="container">
                                <div class="container">
                                    <div class="alert-wrapper">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <div class="message"><i class="nc-icon nc-bell-55"></i>Error</div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
        		}
        		else
        		{
        		    $msg = '<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:200px;" data-notify="container">
                                <div class="container">
                                    <div class="alert-wrapper">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <div class="message"><i class="nc-icon nc-bell-55"></i>Error! try after sometime...</div>
                                    </div>
                                </div>
                            </div>';
        		}
        	}
        	else
        	{
        	    $updateprofileErr = "please upload a image less than 2MB";
        	}
        }
        else
        {
            $updateprofileErr = "please upload a image with .jpg extension";
        }
    }
}

##################### change password ##########################

$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$confirmpass=$_POST['confirmpass'];
$cap = 'CEA19N'.$results['ID'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submit2']))
    {
    	if(!empty($_POST['oldpass']) && !empty($_POST['newpass']) && !empty($_POST['confirmpass']))
    	{
    		if ($newpass==$confirmpass )
    		{
    		    if(strlen($newpass) < 6)
    		    {
    		        $passworderr2 = 'password should be minimum of 6 characters';
    		    }
    		    else
    		    {
    		        if($results['hash_password']==sha1($oldpass))
    			    {
        				$hash_newpassword = sha1($newpass);
        				$sqlupdate= "UPDATE user2019 SET hash_password='$hash_newpassword' WHERE email='$useremail'";
        				if(mysql_query($sqlupdate))
        				{
        					$msg = '<br><div class="alert alert-success alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                    <div class="container">
                        <div class="alert-wrapper">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <div class="message"><i class="nc-icon nc-bell-55"></i>  Password Changed Successfully</div>
                        </div>
                    </div>
                </div>';
        				}
        				else
        				{
        					$msg = '<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                    <div class="container">
                        <div class="alert-wrapper">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <div class="message"><i class="nc-icon nc-bell-55"></i>  Unable to Change Password </div>
                        </div>
                    </div>
                </div>';
        				}
    			    }
        			else
        			{
        				$passworderr1 = 'Enter Correct Old Password';
        			}
    		    }
    	    }
    		else
    		{
    			$passworderr2 = 'Retype the password correctly';
    		}
    	}
    	else
    	{
    		$passworderr1 =  'Enter All The Fields';
    	}
    }
}

###################### events register ################################


if(strcmp($_GET['event'],'Aquanomics')==0){$_SESSION["event"] = 'Aquanomics';}
if(strcmp($_GET['event'],'Concrete Challenge')==0){$_SESSION["event"] = 'Concrete Challenge';}
if(strcmp($_GET['event'],'Encode Steel')==0 ){$_SESSION["event"] = 'Encode Steel';}
if(strcmp($_GET['event'],'Essay')==0 ){$_SESSION["event"] = 'Essay';}
if(strcmp($_GET['event'],'Geo Genius')==0 ){$_SESSION["event"] = 'Geo Genius';}
if(strcmp($_GET['event'],'Master Builder')==0 ){$_SESSION["event"] = 'Master Builder';}
if(strcmp($_GET['event'],'Potential Professor')==0 ){$_SESSION["event"] = 'Potential Professor';}
if(strcmp($_GET['event'],'SDC')==0 ){$_SESSION["event"] = 'SDC';}
if(strcmp($_GET['event'],'Prabandha')==0 ){$_SESSION["event"] = 'Prabandha';}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submit31']))
    {
        $cap = "CEA19N".$results['ID'];
        $capid = substr($cap,6);
    	    if(!empty($_POST['vicecap']) )
    	    {
        	    $vicecap = $_POST['vicecap'];
        		$vicecapid = substr($vicecap, 6);
        		if(strlen($_POST['vicecap'])!= 10 or substr_compare('CEA19N',$_POST['vicecap'],0,6)!= 0)
        		{
    		        $eventsErr = "Please enter proper second CEA ID";
    		    }
    	    }
    		if(!empty($_POST['thirdmem']))
    		{
    		    $thirdmem = $_POST['thirdmem'];
    		    $thirdmemid = substr($thirdmem,6);
    		    if(strlen($_POST['thirdmem']) != 10 or substr_compare('CEA19N',$_POST['thirdmem'],0,6) != 0 
    		    or strcmp($_POST['thirdmem'],$_POST['vicecap'])==0 or strcmp($_POST['thirdmem'],$cap)==0 or substr_compare('CEA19N',$_POST['thirdmem'],0,6) != 0)
    		    {
    		        $eventsErr = "Please enter proper third CEA ID";
    		    }
    		}
    		if(!empty($_POST['fourthmem']))
    		{
    		    $fourthmem = $_POST['fourthmem'];
    		    $fourthmemid = substr($fourthmem,6);
    		    if(strlen($_POST['fourthmem']) != 10 or substr_compare('CEA19N',$_POST['fourthmem'],0,6) != 0
    		    or strcmp($_POST['fourthmem'],$_POST['vicecap'])==0 or strcmp($_POST['fourthmem'],$cap)==0 or strcmp($_POST['thirdmem'],$_POST['fourthmem'])==0 or substr_compare('CEA19N',$_POST['fourthmem'],0,6) != 0 )
    		    {
    		        $eventsErr = "Please enter proper fourth CEA ID";
    		    }
    		}
    		if(!empty($_POST['fifthmem']))
    		{
    		    $fifthmem = $_POST['fifthmem'];
    	    	$fifthmemid = substr($fifthmem,6);
    		    if(strlen($_POST['fifthmem']) != 10 or substr_compare('CEA19N',$_POST['fifthmem'],0,6) != 0 or substr_compare('CEA19N',$_POST['fifthmem'],0,6) != 0
    		    or strcmp($_POST['fifthmem'],$_POST['vicecap'])==0 or strcmp($_POST['fifthmem'],$cap)==0 or strcmp($_POST['fifthmem'],$_POST['fourthmem'])==0 or strcmp($_POST['fifthmem'],$_POST['thirdmem'])==0)
    		    {
    		        $eventsErr = "Please enter proper fifth CEA ID";
    		    }
    		}
    		if(empty($eventsErr))
        	{
        	        $sqlcap= "SELECT * FROM user2019 WHERE ID='$capid'";
                	$capdata = mysql_query($sqlcap);
                	$capdata=mysql_fetch_assoc($capdata);
                	
                	$sqlvicecap= "SELECT * FROM user2019 WHERE ID='$vicecapid'";
                	$vicecapdata = mysql_query($sqlvicecap);
                	$vicecapdata=mysql_fetch_assoc($vicecapdata);
                	
                	$sqlthirdmem= "SELECT * FROM user2019 WHERE ID='$thirdmemid'";
                	$thirdmemdata = mysql_query($sqlthirdmem);
                	$thirdmemdata=mysql_fetch_assoc($thirdmemdata);
                	
                	$sqlfourthmem= "SELECT * FROM user2019 WHERE ID='$fourthmemid'";
                	$fourthmemdata = mysql_query($sqlfourthmem);
                	$fourthmemdata=mysql_fetch_assoc($fourthmemdata);
                	
                	$sqlfifthmem= "SELECT * FROM user2019 WHERE ID='$fifthmemid'";
                	$fifthmemdata = mysql_query($sqlfifthmem);
                	$fifthmemdata=mysql_fetch_assoc($fifthmemdata);
                	
                	$exists1 = strpos($results['events'], $_SESSION["event"]);
                    $exists2 = strpos($vicecapdata['events'], $_SESSION["event"]);
                    $exists3 = strpos($thirdmemdata['events'], $_SESSION["event"]);
                    $exists4 = strpos($fourthmemdata['events'], $_SESSION["event"]);
                    $exists5 = strpos($fifthmemdata['events'], $_SESSION["event"]);
                    
                    if (($exists1 !== false) or ($exists2 !== false) or ($exists3 !== false) or ($exists4 !== false) or ($exists5 !== false) )
                    {
                        $eventsErr = "one of your team member has already registered for ".$_SESSION['event'];
                    }
                    elseif(empty($eventsErr) and !empty($results['ID']))
                    {
                        $presentevent = $results['events'];
                	    $presentevent = $presentevent.', '.$_SESSION["event"];
                	    
                        $q11="UPDATE user2019 SET events ='$presentevent' WHERE ID='$capid'";
                		$q21="UPDATE user2019 SET events ='$presentevent' WHERE ID='$vicecapid'";
                        $q31="UPDATE user2019 SET events ='$presentevent' WHERE ID='$thirdmemid'";
                        $q41="UPDATE user2019 SET events ='$presentevent' WHERE ID='$fourthmemid'";
                        $q51="UPDATE user2019 SET events ='$presentevent' WHERE ID='$fifthmemid'";
                        
                        $eventnamer = $_SESSION["event"];
                        $q111 = "INSERT INTO events (event,captain,vicecaptain,3rdmem,4thmem,5thmem)  values('$eventnamer','$capid','$vicecapid','$thirdmemid','$fourthmemid','$fifthmemid')";
                        $r111= mysql_query($q111);
                        $r11=mysql_query($q11);
                	    $r21=mysql_query($q21);
                	    $r31=mysql_query($q31);
                	    $r41=mysql_query($q41);
                	    $r51=mysql_query($q51);
                	    if($r11 and $r21 and $r31 and $r111 and $r41 and $r51)
                		{
                		    $capname = '<br><br>'."Captain : ".$capdata['firstname'].'<br>';
                		    if(!empty($_POST['vicecap'])){$vicecapname = "Vice-Captain : ".$vicecapdata['firstname'].'<br>';}
                		    if(!empty($_POST['thirdmem'])){$thirdmemname = "Third Member : ".$thirdmemdata['firstname'].'<br>';}
                		    if(!empty($_POST['fourthmem'])){$fourthmemname = "Fourth Member : ".$fourthmemdata['firstname'].'<br>';}
                		    if(!empty($_POST['fifthmem'])){$fifthmemname = "Fifth Member : ".$fifthmemdata['firstname'].'<br>';}
                		    $msg = '<br><div class="alert alert-success alert-with-icon" style="margin:auto; width:20%; min-width:400px;" data-notify="container">
                                <div class="container">
                                    <div class="alert-wrapper">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <div class="message">
                                            <i class="nc-icon nc-bell-55"></i> successfully registered for '.$_SESSION['event'].'<center>'.$capname.$vicecapname.$thirdmemname.$fourthmemname.$fifthmemname.'</center>'
                                        .'</div>
                                    </div>
                                </div>
                            </div>';
                		}
            		    else
            	    	{
                		    $msg = '<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                                <div class="container">
                                    <div class="alert-wrapper">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <div class="message"><i class="nc-icon nc-bell-55"></i> Error ! please try after sometime... </div>
                                    </div>
                                </div>
                            </div>';
                		}
                        
                    }
        	}
    }
}

######################  workshop register ################################


if(strcmp($_GET['workshop'],'Air Quality Control')==0)
{
    $_SESSION["workshop"] = 'Air Quality Control';
}
if(strcmp($_GET['workshop'],'Structural Design')==0)
{
    $_SESSION["workshop"] = 'Structural Design';
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submit41']))
    {
    	$wdegree = $_POST['wdegree'];
    	$year = $_POST['wyear'];
    	if(empty($_POST['wyear']))
    	{
    	    $workshopsErr = "enter a valid year";
    	}
    	$exists1 = strpos($results['workshops'], $_SESSION["workshop"]);
    	if (($exists1 !== false))
        {
            $workshopsErr = "You have already registered for ".$_SESSION['workshop'];
        }
        $workshopnamer = $_SESSION["workshop"];
        $s="SELECT * FROM events WHERE event='$workshopnamer'";
        $result=mysql_query($s);
		$numrows=mysql_num_rows($result);
		if($numrows<100)
		{
		    if(empty($workshopsErr))
    	    {
        	    $presentwork = $results['workshops'];
                $presentwork = $presentwork.', '.$_SESSION["workshop"];
                $capid = "CEA19N".$results['ID'];
                $capid1 = $results['ID'];
                $q11="UPDATE user2019 SET workshops ='$presentwork' WHERE ID='$capid1'";
                $r11=mysql_query($q11);
        	    $workshopnamer = $_SESSION["workshop"];
                $q111 = "INSERT INTO events (event,captain,vicecaptain,3rdmem)  values('$workshopnamer','$capid','$year','$wdegree')";
                $r111= mysql_query($q111);
                $msg = '<br><div class="alert alert-success alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                                    <div class="container">
                                        <div class="alert-wrapper">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                            <div class="message">
                                                <i class="nc-icon nc-bell-55"></i> successfully registered for '.$_SESSION['workshop']
                                            .'</div>
                                        </div>
                                    </div>
                                </div>';
            
    	    }
		}
		else
		{
		    $workshopsErr = "Sorry seats are full...";
		}
    	
    }
}


############################### Research Expo ################################


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['submit5']))
    {
	    if(!empty($_POST['dob']) &&!empty($_POST['street']) &&!empty($_POST['city']) &&!empty($_POST['state']) 
	    &&!empty($_POST['pincode'])&&!empty($_POST['ug']) && !empty($_POST['discipline']) &&!empty($_POST['univ']) 
	    &&!empty($_POST['cgpa']) &&!empty($_POST['year']) && !empty($_POST['gate']) && !empty($_POST['int']) && !empty($_POST['special']))
		{
				$fname=$results['firstname'];
				$dob=$_POST['dob'];
				$gender=$results['gender'];
				$email=$results['email'];
				$street=$_POST['street'];
				$city=$_POST['city'];
				$state=$_POST['state'];
				$phone=$results['phone'];
				$pincode=$_POST['pincode'];
				$ug=$_POST['ug'];
				$discipline=$_POST['discipline'];
				$college=$results['college'];
				$univ=$_POST['univ'];
				$cgpa=$_POST['cgpa'];
				$year=$_POST['year'];
				$gate=$_POST['gate'];
				$int=$_POST['int'];
				$special=$_POST['special'];
				$rid = $results['ID'];

				$file=$_FILES['researchfile'];
				$file_name=$file['name'];
				$file_tmp=$file['tmp_name'];
				$file_size=$file['size'];
				$file_error=$file['error'];
				$file_ext=explode(".",$file_name);
				$file_ext=strtolower(end($file_ext));
				if($file_ext=="pdf")
				{
					$s="SELECT * FROM research WHERE email='$useremail'";
            		$result=mysql_query($s);
            		$numrows=mysql_num_rows($result);
		            if($numrows==0)
		            {
		                if($file_error===0 and ($file_size < 2100000))
    					{
    						$file_name_new='CEA19N'.$results['ID'].'.'.$file_ext;
    						$file_dest="events/uploads/".$file_name_new;
    						if(move_uploaded_file($file_tmp,$file_dest))
    						{
    							$sqlq="INSERT INTO research (CEA_ID,firstname,DOB,gender,email,address,city,state,phone,pincode,UG,discipline,
    							college,univ,cgpa,year,gateappear,ceainterest,specialization,file) 
    							VALUES('$rid','$fname','$dob','$gender','$email','$street','$city','$state','$phone','$pincode',
    							'$ug','$discipline','$college','$univ','$cgpa','$year','$gate','$int','$special','$file_name_new')";
    							if(mysql_query($sqlq))
    							{	
    								$msg='<br><div class="alert alert-success alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                                    <div class="container">
                                        <div class="alert-wrapper">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                            <div class="message"><i class="nc-icon nc-bell-55"></i>You have registered succesfully to the CEA Research Expo</div>
                                        </div>
                                    </div>
                                </div>';
    							}
    							else
    							{
    							    $msg='<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                                    <div class="container">
                                        <div class="alert-wrapper">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                            <div class="message"><i class="nc-icon nc-bell-55"></i>Error!! please try after some time...</div>
                                        </div>
                                    </div>
                                </div>';
    							}
    						}
    					}
    					else
    					{
    						$researchErr='Please upload your PDF file with a proper name as specified and file size should be less than 2MB';//upload the pdf file
    					}
		            }
		            else
		            {
		                $msg='<br><div class="alert alert-danger alert-with-icon" style="margin:auto; width:20%; min-width:350px;" data-notify="container">
                                    <div class="container">
                                        <div class="alert-wrapper">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                            <div class="message"><i class="nc-icon nc-bell-55"></i> You have already registered for research expo</div>
                                        </div>
                                    </div>
                                </div>';
		            }
		            
				}
				else
				{
					$researchErr='Please upload a PDF file';//upload a pdf file
				}
			}
			else
			{
				$researchErr='Please fill all the feilds to register for Research Expo';//enter all feilds
			}
		}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<link rel="icon" type="image/png" href="assets/img/cealogo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
  	<link rel="stylesheet" href="navcss/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="navcss/css/style.css"> <!-- Resource style -->
	<script src="navcss/js/modernizr.js"></script> <!-- Modernizr -->
<title>Profile || CEA Fest 2019</title>
<!-- Bootstrap core CSS     -->
	<link href="profileassets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="profileassets/css/paper-kit.css" rel="stylesheet"/>
	<!--     Fonts and icons     -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="profileassets/css/nucleo-icons.css" rel="stylesheet" />
	<style>
	    ol.w {list-style-type: inherit;line-height:2.2;text-align:justify;}
	    .dropdown .dropdown-menu.dropdown-info .dropdown-item:hover, .dropdown .dropdown-menu.dropdown-info .dropdown-item:focus 
	    {background-color: #6ec7e0;}
	    
.columnphoto {
	margin: 15px 15px 0;
	padding: 0;
}
.columnphoto:last-child {
	padding-bottom: 60px;
}
.columnphoto::after {
	content: '';
	clear: both;
	display: block;
}
.columnphoto div {
	position: relative;
	float: left;
	margin: 0 0 0 25px;
	padding: 0;
}
.columnphoto div:first-child {
	margin-left: 0;
}
.columnphoto div span {
	position: absolute;
	bottom: -20px;
	left: 0;
	z-index: -1;
	display: block;
	margin: 0;
	padding: 0;
	color: #444;
	font-size: 18px;
	text-decoration: none;
	text-align: center;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
	opacity: 0;
}
#figurephoto {
	margin-top: 15px;
	padding: 0;
	background: #fff;
}
#figurephoto:hover+span {
	bottom: -36px;
	opacity: 1;
}




/* Zoom Out #1 */
.hover03 #figurephoto img {
	-webkit-transform: scale(1.2);
	transform: scale(1.2);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover03 #figurephoto:hover img {
	-webkit-transform: scale(1);
	transform: scale(1);
}

	</style>
</head>
<body>
    	<div id="navbar-support" style="background-color:#000000; width:220vh; height:100vh; position:fixed; opacity:0.6; z-index:2; display:none;" onclick="myFunction()"></div>
    <nav class="cd-stretchy-nav">
		<a class="cd-nav-trigger" onclick="myFunction()" href="#0"><span aria-hidden="true"></span></a>
		<ul>
			<li><a href="index.php" ><span style="font-size:14px;">Home</span></a></li>
			<li><a href="project.php"><span style="font-size:14px;">Project</span></a></li>
			<li><a href="event.php"><span style="font-size:14px;">Events</span></a></li>
			<li><a href="workshop.php" ><span style="font-size:14px;">Workshop</span></a></li>
			<li><a href="researchexpo.php"><span style="font-size:14px;">Research expo</span></a></li>
			<li><a href="sponsors.php"><span style="font-size:14px;">Sponsors</span></a></li>
			<li><a href="contact.php"><span style="font-size:14px;">Contact</span></a></li>
			<li><a href="login.php" class="active"><span style="font-size:14px;">Login</span></a></li>
		</ul>
		<span aria-hidden="true" class="stretchy-nav-bg"></span>

	</nav>
			<a href="index.php"> <img src="/2019/main/assets/img/cealogo.png" style="width: 40px; position:fixed; z-index:10; top:20px; left:5%;"  /></a>
	<?php
    $bg = array('1.jpg', '2.jpg', '3.jpg', '4.jpg'); 

    $i = rand(0, count($bg)-1); 
    $selectedBg = "$bg[$i]"; 
    ?>
	<div style="background-image: url('images/photos/large/<? echo $selectedBg; ?>'); min-width:100%; height:250px; background-position: center; background-repeat: no-repeat; background-size: cover; ">
	</div>
	<div class="wrapper">
        
        <div class="section profile-content">
            <div class="container">
                    <div class="owner">
                        <div class="avatar">
                            <? if(file_exists("images/profilePics/CEA19N".$results['ID'].".jpg"))
                            { 
                                $imgsrc = "images/profilePics/CEA19N".$results['ID'].".jpg";
                            }
                            else
                            {
                                if($results['gender']=='M')
                                { 
                                    $imgsrc = "images/profilePics/profilemale.jpg";
                                }
                                elseif($results['gender']=='F')
                                { 
                                    $imgsrc = "images/profilePics/femaleprofile.jpg";
                                    
                                }
                                else
                                {
                                    $imgsrc = "images/profilePics/profile.jpg";
                                }
                            }?>
                            <a href="#" data-toggle="modal" data-target="#editprofileModal"><img src=<? echo $imgsrc; ?> alt="Circle Image" class="img-circle img-no-padding img-responsive"></a>
                            
                            
                        </div>
                        <div class="name">
                            <h3 class="title"><? echo $name ?><br /></h3>
    						<h5 class="description">Welcome to Dash-board </h5><br>
                        </div>
                    </div>
                    <? if(!empty($msg)){ echo $msg; }?>
                    
                    <div class="row" style="font-family:Georgia;">
                        <div class="col-md-6 ml-auto mr-auto text-center">
                            <h5 class="description">Your CEA ID CARD</h5><br>
                            <div id="qr" ><?php echo '<img src="QR.php" />'; ?></div>
                            <h6 style="margin-top:40px; Montserrat, Helvetica, Arial, sans-serif; color:black;">CEA ID : <? echo "CEA19N".$results['ID']; ?></h6><br>
                            <h6 style="font-family:Montserrat, Helvetica, Arial, sans-serif; color:black;">College: <? echo $college; ?> </h6><br>
                            <h6 style="font-family:Montserrat, Helvetica, Arial, sans-serif; color:black;">Phone no: <? echo $phone; ?> </h6>
                            <br />
                        </div>
                    </div>
                    <br/>
                    <center>
                        <button type="button" class="btn btn-outline-success btn-round btn-lg" data-toggle="modal" data-target="#editprofileModal">edit profile</button> 
                        <button type="button" class="btn btn-outline-success btn-round btn-lg" data-toggle="modal" data-target="#changepasswordModal">change password</button>
                        <a href="https://ceaiitm.org/2019/onlinequiz/quiz.php"><button type="button" class="btn btn-outline-success btn-round btn-lg">Online Quiz</button></a> 
                        <button type="button" class="btn btn-outline-success btn-round btn-lg" data-toggle="modal" data-target="#registereventsModal">register for events</button>
                        <button type="button" class="btn btn-outline-success btn-round btn-lg"data-toggle="modal" data-target="#workshopregisterModal">register for workshops</button> 
                        <button type="button" class="btn btn-outline-success btn-round btn-lg" data-toggle="modal" data-target="#researchexpoModal">register for research expo</button>
                        <a href="certi.php"><button type="button" class="btn btn-outline-success btn-round btn-lg">Certificate</button></a>  
                    </center>
                    <br/>
                    <br/>
                    <br/>
                  <div class="nav-tabs-navigation">
                      <center><p style="color:#868e96"><h2>Registered</h2></p></center><br><br>
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#following" role="tab">Workshops</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                <!-- Tab panes -->
              <div class="tab-content following">
                 <div class="tab-pane text-center active" id="follows" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <li>
                                        <div class="row">
                                        <? if(strpos($results['events'],'Aquanomics')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Aquanomics"><img src="eventsimages/aqua.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Bon Auto Routier')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Bon Auto Routier"><img src="eventsimages/bon.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Concrete Challenge')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Concrete challenge"><img src="eventsimages/cc.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Debate')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Debate"><img src="eventsimages/debate.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Encode Steel')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Encode Steel"><img src="eventsimages/encode.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Essay')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Essay"><img src="eventsimages/essay.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Geo Genius')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Geo Genius"><img src="eventsimages/geo.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Master Builder')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Master Builder"><img src="eventsimages/master.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Modelling')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Modelling"><img src="eventsimages/model.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'OPC')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Online Photography"><img src="eventsimages/opc.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Potential Professor')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Potential Professor"><img src="eventsimages/prof.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Quiz')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Quiz"><img src="eventsimages/oquiz.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'SDC')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="SDC"><img src="eventsimages/sdc.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Case study')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="casestudy"><img src="eventsimages/casestudy.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Bentley1')==TRUE || strpos($results['events'],'Bentley2')==TRUE || strpos($results['events'],'Python')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="workshop"><img src="eventsimages/workshop.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(strpos($results['events'],'Prabandha')==TRUE)
                                            {?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Prabandha"><img src="eventsimages/prabandha.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                            <?}?>
                                            <? if(empty($results['events'])){?>
                                            <div class="tab-pane text-center" id="follows" role="tabpanel">
                                                <h3 class="text-muted">None registered yet :(</h3>
                                            </div>
                                            <?}?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
                    <div class="tab-pane text-center" id="following" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <li>
                                        <div class="row">
                                        <? if(strpos($results['workshops'],'STAAD PRO Workshop')==TRUE){?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="STAAD PRO Workshop"><img src="images/staadpro.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                        <?}?>
                                        <? if(strpos($results['workshops'],'Air Quality Control')==TRUE){?>
                                            <div class="col-md-4 col-sm-6 ml-auto mr-auto hover03 columnphoto">
                                                <a><figure id="figurephoto" data-toggle="tooltip" data-placement="bottom" title="Air Quality Control"><img src="events/images/intro/workshop2" alt="Circle Image" class="img-circle img-no-padding img-responsive"/></figure></a>
                                            </div>
                                        <?}?>
                                        <? if(empty($results['workshops'])){?>
                                            <div class="tab-pane text-center" id="following" role="tabpanel">
                                                <h3 class="text-muted">None registered yet :(</h3>
                                            </div>
                                        <?}?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
<!--- ##################################### Deregister events Modal ################################### -->

<!--	<div class="modal fade" id="workshopregisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Deregister event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <div class="right-side">
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>     -->
	
<!-- ########################################## transaction ############################### -->

    <div class="modal fade" id="transModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Transaction Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <center><font color="red"><? echo $transErr; ?></font><font color="green"><?echo $transmsg; ?></font></center><br>
                            <label class="control-label col-md-12">Please mention your transaction id if your payment is done... <font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="trans" id="trans1" value="<? echo $trans;?>" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submittrans" id="submittrans" class="btn btn-success btn-link">Submit</button>
                        </div>
                        <div class="divider"></div>
                            <div class="right-side">
                                <button type="button" id="submitlater" class="btn btn-warning btn-link" data-dismiss="modal" >Later</button>
                            </div>
                        </div>
                </form>
            </div>
		</div>
	</div>
<!--- ################################### CA questions  ############################################# -->
    
    	<div class="modal fade" id="CAModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <center><font color="red"><? echo $CAErr; ?></font><font color="green"><?echo $CAmsg; ?></font></center><br>
                        <p style="color:#868e96">Did you attend the last edition of CEA? <font color="red"> *</font></p>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="attend" id="attend1" value="Yes"> Yes <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="attend" id="attend2" value="No"> No <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <p style="color:#868e96"> Where did you get to know about CEA? <font color="red"> *</font></p>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="q1" id="q11" value="ca" data-toggle="collapse" data-target="#yes"> Campus Ambassador <span class="form-check-sign"></span>
                                </label>
                                <div class="control-group collapse" id="yes">
								    <div class="form-group">
                                        <p style="color:#868e96"> Name of the Campus Ambassador <font color="red"> *</font></p>
                                        <div class="input-group col-md-12">
                                            <input class="form-control" type="text" name="caname" id="caname1" value="<? echo $caname;?>">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
								</div>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="q1" id="q12" value="social"> Social Media(Facebook, Twitter etc.) <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="q1" id="q13" value="publi" > CEA Publicity Programme <span class="form-check-sign"></span>
                                </label>
                        </div><br>
                        
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submitca" id="submitca" class="btn btn-success btn-link">Submit</button>
                        </div>
                        <div class="divider"></div>
                            <div class="right-side">
                                <button type="button" class="btn btn-warning btn-link" data-dismiss="modal">Later</button>
                            </div>
                        </div>
                </form>
            </div>
		</div>
	</div>
    
<!--- ################################### edit profile modal  ############################################# -->
    
    	<div class="modal fade" id="editprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <center><font color="red"><? echo $updateprofileErr; ?></font></center>
                            <label class="control-label col-md-12">Name<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="name" id="name1" value="<? echo $name;?>" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                            </div><font color="red"><? echo $nameErr ?></font>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">Phone<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="phone" id="phone1" value="<? echo $phone;?>" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></span>
                            </div><font color="red"><? echo $phoneErr ?></font>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">College<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="college" id="college1" value="<? echo $college;?>" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-book fa-2x" aria-hidden="true"></i></span>
                            </div><? echo $collegeErr ?></font>
                        </div>
                        <ol class="w" style="text-align:justify;">
                            <li>The file size is limited to <strong>2MB</strong> and only <strong>.jpg</strong> are allowed</li>
                        </ol>
                        <span><strong>Profile Pic : </strong> <input type="file" name="profilephoto" accept="image/*" /></span>
                        
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submit1" id="submit11" class="btn btn-success btn-link">Update</button>
                        </div>
                        <div class="divider"></div>
                            <div class="right-side">
                                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
	
<!--- ############################# change password modal ###################################### -->

	<div class="modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-12">Old Password<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="password" name="oldpass" value="<? echo $oldpass;?>" placeholder = "enter your old password" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key fa-2x" aria-hidden="true"></i></span>
                            </div><font color="red"><? echo $passworderr1 ?></font>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">New Password<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="password" name="newpass" value="<? echo $newpass;?>" placeholder = "enter your new password" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key fa-2x" aria-hidden="true"></i></span>
                            </div><font color="red"><? echo $passworderr2 ?></font>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">Confirm Password<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="password" name="confirmpass" value="<? echo $confirmpass;?>" placeholder = "enter confirm password" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submit2" id="submit2" class="btn btn-success btn-link">Update</button>
                        </div>
                        <div class="divider"></div>
                            <div class="right-side">
                                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
	
	
<!--- ##################################### select event for registration modal ################################### -->

	<div class="modal fade" id="registereventsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Register for Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol class="w">
                        <li>Please create your team.</li>
                        <li>A person can participate in multiple events but, he/she cannot take part in the same event with two different teams.</li>
                        <li>You will be the team captain by default if you register through your account.</li>
                        <li>Only the team captain can deregister the team from an event.</li>
                        <li>Enter the CEA IDs of your Team-mates.</li>
                        <li>The size of team should be minimum of 2 members except for Essay Writing and Potential Professor.</li>
                    </ol>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="false">select the event</a>
                        <ul class="dropdown-menu dropdown-info" style="margin:auto;" aria-labelledby="dropdownMenuButton">
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Aquanomics'"/>Aquanomics
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Bon Auto Routier'" />Bon Auto Routier -->
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Concrete Challenge'" />Concrete Challenge -->
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Debate'" />Debate -->
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Encode Steel'" />Encode Steel
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Essay'" />Essay
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Geo Genius'" />Geo Genius -->
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Master Builder'" />Master Builder
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Potential Professor'" />Potential Professor -->
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=Prabandha'" />Prabandha 
                            <!--<li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?event=SDC'" />SDC
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php'" />Rest of the events will be <br> opened for registration shortly -->
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="right-side">
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	
<!--- ############################## select the team for event registration modal ############################################ -->

	<div class="modal fade" id="multieventregisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"><? echo $_SESSION['event']; ?> registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <center><font color="red"><? echo $eventsErr; ?></font></center>
                            <center>enter all CEA ID in caps</center><br>
                            <label class="control-label col-md-12">Captain CEA ID<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="cap" value="<? echo $cap;?>" disabled>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <? if(strcmp($_SESSION["event"],'Essay')!=0 and strcmp($_SESSION["event"],'Potential Professor')!=0 )
                        {?>
                        <div class="form-group">
                            <label class="control-label col-md-12">Vice-Captain CEA ID<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="vicecap" value="<? echo $vicecap;?>" placeholder = "CEA19NXXXX" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3rd member's CEA ID</label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="thirdmem" value="<? echo $thirdmem;?>" placeholder = "CEA19NXXXX">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-group fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div><?
                        if(strcmp($_SESSION["event"],'Aquanomics')!=0)
                        {?>
                        <div class="form-group">
                            <label class="control-label col-md-12">4th member's CEA ID</label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="fourthmem" value="<? echo $fourthmem;?>" placeholder = "CEA19NXXXX">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-group fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <?if(strcmp($_SESSION["event"],'Concrete Challenge')!=0 and strcmp($_SESSION["event"],'Geo Genius')!=0 and strcmp($_SESSION["event"],'Master Builder')!=0 and strcmp($_SESSION["event"],'Encode Steel')!=0 )
                        {?>
                        <div class="form-group">
                            <label class="control-label col-md-12">5th member's CEA ID</label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="fifthmem" value="<? echo $fifthmem;?>" placeholder = "CEA19NXXXX">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-group fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <?
                        }
                        }
                        }?>
                        
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submit31" class="btn btn-success btn-link">Register</button>
                        </div>
                        <div class="divider"></div>
                            <div class="right-side">
                                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
	
<!--- ##################################### select workshop for registration modal ################################### -->

	<div class="modal fade" id="workshopregisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Workshop registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol class="w">
                        <li>Registrations are <strong>confirmed</strong> only after the payment is done.</li>
                    </ol>
                        <p>Amount needed to be paid is</p>
                        <? if($paymenttest['payment']==0){?>
                        <p>Fest registration Fee : &#x20B9 300<br> Workshop registration fee : &#x20B9 500 per workshop <br></p>
                        <?}else{?>
                        <b><p>Workshop registration fee : &#x20B9 500 per workshop</p><?}?>
                        <p>Payments are to be done with <strong>1 hour</strong> of registration to confirm your seat</p></b>
                        <br>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="false">select the Workshop</a>
                        <ul class="dropdown-menu dropdown-info" style="margin:auto;" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?workshop=Air Quality Control'"/>Air Quality Control
                            <li class="dropdown-item" style = "cursor: pointer;" onclick="window.location.href='profile.php?workshop=Structural Design'" />Structural Design
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="right-side">
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	
<!--- ############################## select the team for workshop registration modal ############################################ -->

	<div class="modal fade" id="multiworkshopregisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"><? echo $_SESSION['workshop']; ?> registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <p>Amount needed to be paid is</p>
                        <? if($paymenttest['payment']==1){?>
                        <p><?echo $_SESSION['workshop']; ?> registration fee : &#x20B9 500 </p>
                        <?}else{?>
                        <p>Fest registration Fee : &#x20B9 300<br> <?echo $_SESSION['workshop']; ?> registration fee : &#x20B9 500 <br><br> <b>Total amount needed to be paid : &#x20B9 800</b></p><br>
                        <p style="font-weight: 500;"><strong>Payments are to be done with 1 hour of registration to confirm your seat.<br>
                        Registration will automatically get cancelled if payments are not done within 1 hour.</strong></p>
                        <?}?>
                        <p style="font-weight: 500;"><strong> Please mention your CEA ID in description during payment for reference</strong></p></center>
                        <center><font color="red"><? echo $workshopsErr; ?></font></center>
                            <p style="color:#868e96">Please mention your Degree <font color="red"> *</font></p>
                            
                            <div class="form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="wdegree" value="B Tech" checked> B.Tech <span class="form-check-sign"></span>
                                    </label>
                            </div>
                            <div class="form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="wdegree" id="M Tech" value="Mtech"> M.Tech <span class="form-check-sign"></span>
                                    </label>
                            </div>
                            <div class="form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="wdegree" id="Ph.D" value="Ph.D" > Ph.D <span class="form-check-sign"></span>
                                    </label>
                            </div>
                            <div class="form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="wdegree" id="others" value="others" > others <span class="form-check-sign"></span>
                                    </label>
                            </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">Year of study<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="wyear" value="<? echo $wyear;?>" placeholder = "3rd year" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div><br>
                        <br>
                       
                        
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submit41" class="btn btn-success btn-link">Register</button>
                        </div>
                        <div class="divider"></div>
                            <div class="right-side">
                                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>

<!-- ##################################### research expo registration modal ########################### -->

	<div class="modal fade" id="researchexpoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Research Expo registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <center><font style="color:red;"><? echo $researchErr; ?></font></center><br>
                            <label class="control-label col-md-12">Date Of Birth<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="dob" value="<? echo $dob;?>" placeholder = "31/05/1993" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <br><h4 style="text-align:center; color:#6ec7e0" >Address:</h4>
                        <div class="form-group">
                            <label class="control-label col-md-12"> Door no. and street name<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="street" value="<? echo $street;?>" placeholder = "enter your door no. and street name" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">City / Town / Village<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="city" value="<? echo $city;?>" placeholder = "enter your city or town or village" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">State / Union Territory<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="state" value="<? echo $state;?>" placeholder = "enter your state" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">Pincode<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="pincode" value="<? echo $pincode;?>" placeholder = "enter your area pincode eg:600036" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <br><h4 style="text-align:center; color:#6ec7e0" >Educational qualification</h4>
                        <div class="form-group">
                            <label class="control-label col-md-12">UG Degree<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="ug" value="<? echo $ug;?>" placeholder = "enter your UG Degree" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mortar-board fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">Discipline<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="discipline" value="<? echo $discipline;?>" placeholder = "eg: Civil Engineering" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mortar-board fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">University<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="univ" value="<? echo $univ;?>" placeholder = "enter your university name" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-institution fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">CGPA/percentage (as on today)<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="cgpa" value="<? echo $cgpa;?>" placeholder = "eg: 9.23" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">year of graduation<font color="red"> *</font></label>
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="year" value="<? echo $year;?>" placeholder = "enter (expected) year of graduation" required>
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-o fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <br><h4 style="text-align:center; color:#6ec7e0" >registration details</h4><br>
                        <p style="color:#868e96">Appeared for gate 2016 <font color="red"> *</font></p>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gate" id="gate1" value="Yes" checked> Yes <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gate" id="gate2" value="No"> No <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <p style="color:#868e96">Are you interested in presenting a poster in CEA 2019 Research Expo ? <font color="red"> *</font></p>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="int" id="int1" value="yes" checked> Yes <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="int" id="int2" value="No" > No <span class="form-check-sign"></span>
                                </label>
                        </div><br>
                        <p style="color:#868e96">Please mention your area of specialization <font color="red"> *</font></p>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="special" id="special1" value="BTCM" checked> Building technology and Construction Management <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="special" id="special2" value="Envi and Water"> Environmental and Water resource Engineering <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="special" id="special3" value="Geo" > Geotechnical Engineering <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="special" id="special4" value="Structural"> Structural Engineering <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="special" id="special5" value="Transpo" > Transportation Engineering <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="special" id="special6" value="none"> None / Others <span class="form-check-sign"></span>
                                </label>
                        </div>
                        <br><h4 style="text-align:center; color:#6ec7e0" >Upload your file in a PDF format <font color="red"> *</font></h4><br>
                        <ol class="w" style="text-align:justify;">
                            <center>It should consist the following documents</center><br>
                            <li> Recent photograph of you, Statement of Purpose, Curriculum Vitae, Semester Mark Sheets, GATE admit Card</li>
                            <li>The name of the file should be your CEA ID: <strong>CEA19Nxxxx.pdf</strong> for eg: CEA19N1234.pdf</li>
                            <li>The file size is limited to <strong>2MB</strong> and only .pdf are allowed</li>
                        </ol>
                        <input type="file" class="upload" accept="application/pdf" name="researchfile" />
										
    
                    </div>
                    <div class="modal-footer">
                        <div class="left-side">
                            <button name="submit5" id="submit5" class="btn btn-success btn-link">Register</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
	
	
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
<? if(!empty($updateprofileErr)){?>
    
    <script type="text/javascript">
    $(document).ready(function()
    {
        $('#editprofileModal').modal('show');
    });
    </script><?
}?>

<? if(!empty($passworderr1) or !empty($passworderr2)){?>
    
    <script type="text/javascript">
    $(document).ready(function()
    {
        $('#changepasswordModal').modal('show');
    });
    </script><?
}?>
<? if(!empty($eventsErr) or strcmp($_GET['event'],'Prabandha')==0 or strcmp($_GET['event'],'Master Builder')==0){?>
    
    <script type="text/javascript">
    $(document).ready(function()
    {
        $('#multieventregisterModal').modal('show');
    });
    </script><?
}?>
<? if(!empty($workshopsErr) or strcmp($_GET['workshop'],'Air Quality Control')==0 or strcmp($_GET['workshop'],'Structural Design')==0){?>
    
    <script type="text/javascript">

    $(document).ready(function()
    {
        $('#multiworkshopregisterModal').modal('show');
    });
    </script><?
}?>

<? if ($results['CA']==0){?>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#CAModal').modal('show');
    });
    </script>
<?}?>
<? $sqlt= "SELECT * FROM events WHERE captain = '$CEAID'";
	$transv = mysql_query($sqlt);
	while($rs10 = mysql_fetch_array($transv)) 
    {
        if((strcmp($rs10['event'],'Structural Design')==0 or strcmp($rs10['event'],'Air Quality Control')==0) and $rs10['payment']==0 and strcmp($results['transaction'],'0')==0)
        {?>
            <script type="text/javascript">
                $(document).ready(function()
                {
                    $('#transModal').modal('show');
                });
            </script>
        <?}
    }?>
	

<? if(!empty($researchErr)){?>
    
    <script type="text/javascript">
    $(document).ready(function()
    {
        $('#researchexpoModal').modal('show');
    });
    </script><?
}?>
<script>
    function myFunction() {
    var x = document.getElementById("navbar-support");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

    function myFunction2() {
    var x = document.getElementById("navbar-support");
    if (x.style.display === "block") {
        x.style.display = "none";
    }
    }
</script>
<script src="assets/js/jquery.tagsinput.js"></script>
<script src="navcss/js/jquery-2.1.4.js"></script>
<script src="navcss/js/main.js"></script> <!-- Resource jQuery -->
<script src="profileassets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="profileassets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="profileassets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="profileassets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="profileassets/js/paper-kit.js"></script>
<!-- Core JS Files -->


</html>
