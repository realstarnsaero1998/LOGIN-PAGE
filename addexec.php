<?php

include('header.php');
error_reporting(0);
session_start();
include_once 'oesdb.php';

if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/".$_FILES["image"]["name"]);
			
			$location="photos/".$_FILES["image"]["name"];
			
			   $name=$_POST['cname'];
    $mail_id=$_POST['email'];
    $pass=$_POST['password'];
   
	$contact_number=$_POST['contactno'];
		$whatsapp=$_POST['whatsapp'];
			$address=$_POST['address'];
			$city=$_POST['city'];
			$student=$_POST['student'];
			$pin=$_POST['pin'];
	if($file!=""){
  $insert_qry=mysql_query("UPDATE `student` SET `stdname`='$name',`stdpassword`='$pass',`emailid`='$mail_id',`contactno`='$contact_number',`address`='$address',`city`='$city',`pincode`='$pin',`image`='$location' WHERE `stdid`='$student'");
	}
	else{
		$insert_qry=mysql_query("UPDATE `student` SET `stdname`='$name',`stdpassword`='$pass',`emailid`='$mail_id',`contactno`='$contact_number',`address`='$address',`city`='$city',`pincode`='$pin' WHERE `stdid`='$student'");
	}
			
	 
        if($insert_qry)
        {
		
			header("location: index.php");
			exit();					
        }
        else
        {
           echo "<script>
alert('Cant Update');</script>";
          
        }
    
			
	}
?>
