<?php
include('header.php');
include("database.php");
$user_id=$_SESSION['user_id'];
$sql_qry=mysql_query("select * from mst_user where user_id='$user_id'");
$sql_qry_arr=mysql_fetch_array($sql_qry);
if(isset($_POST['upload']))
{

if (!isset($_FILES['image']['tmp_name'])) {
	echo "error";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES['image']['tmp_name'],"photos/" . $_FILES['image']['name']);
			
			$location="photos/" . $_FILES['image']['name'];
            $username=$_POST['username'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $password=$_POST['pass'];
            $rpassword=$_POST['rpass'];

    if($password == $rpassword)
    {
      $query=mysql_query("UPDATE mst_user SET username='$username', address='$address', city='$city', pass='$password', pass='$rpassword', image='$location' WHERE user_id='$user_id'") or die(mysql_error());
	 
	   
			
	 
        if($query)
        {
		
			header("location:edit_profile.php");
			exit();				
        }
        else
        {
           echo "<script>
alert('Cant Update');</script>";
          
        }
    }
     
}
    
	}

?>