<?php
$host="localhost"; // Host name 
$username="progin"; // Mysql username 
$password="progin"; // Mysql password 
$db_name="progin_405_13510011"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['inputusername']; 
$mypassword=$_POST['inputpass']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password=sha1('$mypassword')";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

	// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_start(); 
	$_SESSION['myusername'] = $myusername;
	header("location:profil.php");
}
else {
	header("location:index.php?status=1");
}

?>
