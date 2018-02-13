<?php
require("database.php");

session_start();

if(isset($_POST['login']))
{
					$date=date('y-m-d');
					$myusername=$_POST['emailid']; 
					$mypassword=$_POST['password']; 
					
					
					$myusername = stripslashes($myusername);
					$mypassword = stripslashes($mypassword);
					$myusername = mysql_real_escape_string($myusername);
					$mypassword = mysql_real_escape_string($mypassword);
$tbl_name="tmp";
	
	/*---------------------------------------New Query------------------------------------*/
	$up_qry=mysql_query("SELECT * FROM `student` WHERE `emailid`='$myusername' AND `stdpassword`='$mypassword' AND `status`='1'");
	$query=mysql_fetch_array($up_qry);
	$ex_date=$query['ex_date'];
	$status=$query['status'];
	if($date > $ex_date){
		mysql_query("UPDATE `student` SET `status`='0' WHERE `emailid`='$myusername' AND `stdpassword`='$mypassword'");
		echo "<script>alert('Subscription Expired');</script>";
		
	}   
	/*--------------------------------------/New Query------------------------------------*/

		            $login_qry="SELECT * FROM `student` WHERE `emailid`='$myusername' AND `stdpassword`='$mypassword' AND `status`='1'" ;
			/*		 $login_qry="SELECT *,DECODE(pass,'pass')as pass FROM mst_user WHERE status='approved' and email='".htmlspecialchars($myusername,ENT_QUOTES)."' and pass=ENCODE('".htmlspecialchars($mypassword,ENT_QUOTES)."','pass')" ;
					 //echo $login_qry; exit;
			*/			

	
					$result=mysql_query("SELECT * FROM `student` WHERE `emailid`='$myusername' AND `stdpassword`='$mypassword' AND `status`='1'")or die("cant access");

					
					$count=mysql_num_rows($result);
					
					
					if($count>0){
					
					$insert_qry_arr=mysql_fetch_array($result);
					
						
					$stdname=$insert_qry_arr['stdname'];
					$_SESSION['stdname']=$stdname;
					$emailid=$insert_qry_arr['emailid'];
					$_SESSION['emailid']=$emailid;
					$stdid=$insert_qry_arr['stdid'];
					$_SESSION['stdid']=$stdid;
					
						/*---------------------------date-------------------*/
						$e_date=$insert_qry_arr['ex_date'];
						$date=date('y-m-d');
						if($e_date<=$date){
							mysql_query("UPDATE `student` SET `payment`='unpaid' WHERE `stdid`='$stdid'");
						}
						
						/*--------------------------/date-------------------*/
					
					
					header("Location:index.php");
					}
					else {
                   $display = true;
						//  $_GLOBALS['message'] = "Invalid LogIn Cridentials";
						 echo "<script>alert('Username or password is Incorrect');</script>";
                        
                
								}
    header("location:index.php");
}

?>