<?php

$host="localhost"; // Host name 
$username="progin"; // Mysql username 
$password="progin"; // Mysql password 
$db_name="progin_405_13510011"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// post data 
$username=$_POST['username']; 
$password=$_POST['password'];
$fullname=$_POST['nama'];
$birthdate=$_POST['tgl'];
$email=$_POST['email'];
if ($_FILES["avatar"]["error"] > 0) {
	$avatar="images/niouw.JPG";
} else {
	if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/".$username.".jpg")) {
		$avatar="images/".$username.".jpg";
	} else {
		$avatar="images/niouw.JPG";
	}
}
if ($_POST['sex']=="male") {
	$gender='M';
} else {
	$gender='F';
}
$about=$_POST['about'];


// To protect MySQL injection (more detail about MySQL injection)
$sql="INSERT INTO $tbl_name(username,password,fullname,birthdate,email,avatar,about) VALUES ('$username',sha1('$password'),'$fullname','$birthdate','$email','$avatar','$about')";
$result=mysql_query($sql);

header("location:index.php?status=4");

?>