<?php 

require("database.php");
session_start();
require 'PHPMailer/PHPMailerAutoload.php'; 
if(isset($_POST['submit']))
{
	
	$name=mysql_real_escape_string($_POST['name']);
	$mail_id=mysql_real_escape_string($_POST['mail_id']);
$password=uniqid();
	$ex_date= date("y-m-d", strtotime("+90 days"));
	
	//$image=mysql_real_escape_string($_POST['image']);
	
	$search_duplicate_qry=mysql_query("SELECT * FROM `student` where emailid='$mail_id'")or die(mysql_error());
    $count_row=mysql_num_rows($search_duplicate_qry);
	
    // $ref_count_qry=mysql_query("select * from tbl_users where id='$user_id'");
      //                              $ref_count_qry_arr=mysql_fetch_array($ref_count_qry);
    //$uploadedby=$ref_count_qry_arr['name'];
	
    if($count_row<1)
    {
        
        $insert_qry=	mysql_query(" INSERT INTO `student`(`stdname`, `stdpassword`, `emailid`, `contactno`, `address`, `city`, `pincode`,`image`,`status`,`ex_date`,`payment`) VALUES ('$name','$password','$mail_id',0000000000,'Address','City',000000,'photos/user.jpg','1','$ex_date','unpaid')")or die(mysql_error());
		  $reg_success=1;
/*        $insert_qry=	mysql_query("INSERT INTO `mst_user`(`login`, `username`,`pass`, `address`, `city`, `phone`, `email`,`image`,`status`) VALUES ('$name','".htmlspecialchars($name,ENT_QUOTES)."',ENCODE('".htmlspecialchars($password,ENT_QUOTES)."','pass'),'address','address','123456','".htmlspecialchars($mail_id,ENT_QUOTES)."','photos/user.jpg','enrolled')")or die(mysql_error());
		  $reg_success=1;   */
        
        echo "<script>alert('Registered Successfully'); </script>";
        header("location:index.php");
   
      
    }
    else
    {
        echo "<script>
alert('Contact Number or mailid is Already Register');</script>";
header("location:index.php");
    }


if($reg_success==1){

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'brothergarmentsvkl@gmail.com';                 // SMTP username
$mail->Password = 'kaashiv123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                  // TCP port to connect to
/*testing*/ 

$mail->AddAttachment($location1);

$cus_mail_id=$mail_id;
$cus_name=$name;
$cus_pass=$password;


/*-------------------------*/
$mail->From = 'sculpteclat.info@gmail.com';
$mail->FromName = 'Nandha InfoTech';
$mail->addAddress($cus_mail_id,$cus_name);     // Add a recipient
//$mail->addAddress('brother@gmail.com');               // Name is optional
//$mail->addReplyTo('brother@gmail.com', 'Brother');
$mail->isHTML(true);
//$mail->isHTML(false);                                  // Set email format to HTML

$mail->Subject = 'Welcome To Nandha InfoTech';
$mail->Body    = '
<?php  $reason="hi";
	   $costs=$_POST["cost"];
	    $priority=$_POST["priority"];
	   $file=$_FILES["image"]["tmp_name"]; ?>


<html>
<head>
<title>Nandha InfoTech</title>
</head>
<body>

<table cellpadding="0" cellspacing="0" border="0" widtd="600" align="center" style="border:#E6E6E6 solid thin;">
<tr>
<td style=" width: auto; height: auto;"><table><tr>
<td align="left" ><a href="http://bit.ly/1qGlyRf" style="text-decoration:none;" target="_blank">
	<div style=" width:370px; height:auto; font-family:sans-serif; font-size:28px; line-height:.8em;  padding:20px; text-decoration:none; font-weight:bolder; background-color:#fff;">
    	
    </div><span style=" color: #262D68;">Best </span><span style="color:#266038;">Online Examinations website</span>
    </a></td>
    
      </tr></table></td>
</tr>
<tr>
<td>
</td>
</tr>
<tr>
<td><table width="582" height="271" border="0" align="center" cellpadding="0" cellspacing="0" widtd="98%">

   
    <tr>
<td align="center" style=" font-family:calibri; font-size:45px; color:#000000 !important;" ><span href="#" style="font-family:calibri; font-size:25px; color:#266038 !important; text-decoration:none;"><strong>Log-In Details</strong></span></td>
    </tr>
    
     <tr>
      <td align="center" >&nbsp;<br/></td>
    </tr>
    <tr>
<td align="left" style=" font-family: calibri; font-size:45px; color: #000000 !important;" >
	<span href="#" style="font-family: calibri; font-size:16px; text-decoration:none; padding-left:140px;"> Dear  '.$cus_name.'</span></td>
    </tr>
    <tr>
<td align="left" style=" font-family: calibri; font-size:45px; color: #000000 !important;" >
	<span href="#" style="font-family: calibri; font-size:16px; text-decoration:none; padding-left:140px;"> Details</span></td>
    </tr>
   
    <tr>
<td align="left" style=" font-family: calibri; font-size:45px; color: #000000 !important;" >
	<span href="#" style="font-family: calibri; font-size:16px; text-decoration:none;padding-left:140px;"> •	USER NAME : '.$cus_mail_id.'</span></td>
    </tr>
    <tr>
<td align="left" style=" font-family: calibri; font-size:45px; color: #000000 !important;" >
	<span href="#" style="font-family: calibri; font-size:16px; text-decoration:none;padding-left:140px;"> •	PASSWORD : '.$cus_pass.'</span></td>
    </tr>

<tr>
  <td >&nbsp;</td>
  </tr>
		
         <tr>
<td align="center" style=" font-family:calibri; font-size:19px; color:#000000 !important;" ><span href="#" style="font-family:calibri; font-size:22px; color:#266038 !important; text-decoration:none;"><strong>Most of all follows the 5 S</strong></span></td>
    </tr>
        

<tr>
  <td >&nbsp;</td>
</tr>

<tr>
  <td style="padding:10px;" align="center" ><span style=""><a href="#" style=" background-color:#638911; width:auto;text-decoration:none;  padding:8px 35px 8px 35px; color:#680A27; font-size:18px; font-family:calibri; " target="_blank" title="Click Here to Log-In Now"><span style=" color:#FFFFFF; font-size:20px;">Click Here to Log-In Now</span></a></span></td>
</tr>
<tr><td >&nbsp;</td></tr><tr><td align="center" style="font-family:Arial, Helvetica, sans-serif; color:#183C86; font-size:16px;">Avail 100% Satisfaction</td></tr>
<tr>
  <td align="center" style="font-family:Arial, Helvetica, sans-serif; color:#3a65a2; font-size:21px;">&nbsp;</td>
</tr>
<tr>
<td style="width:100%; height:30px; background-color:#266038; color:#fff; font-family:sans-serif; font-size: 13px;">&nbsp;&nbsp; *Designed and Maintained By SculptEclat Tech Solutions</td>
</tr>

</table></td></tr>

</table>
</body>
</html>
';


if(!$mail->send()) 
	{
	echo "<script>alert ('Mail Not Sent')</script>";

												  }else{
													  echo "<script>alert ('Mail has been sent to vendor')</script>";
												  }

}else 	
		{
    	
		?>
<script>
alert("Register Successfully");
window.location="index.php";
</script><?php
	
		 }  
 }?>