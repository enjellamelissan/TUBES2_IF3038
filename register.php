<?php

$host="localhost"; // Host name 
$username="progin"; // Mysql username 
$password="progin"; // Mysql password 
$db_name="progin_405_13510011"; // Database name 

// Connect to server and select databse.
$con=mysqli_connect($host,$username,$password,$db_name);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

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

$result=mysql_query($con,"INSERT INTO `members` (username,password,fullname,birthdate,email,avatar,gender,about) VALUES ('$username',sha1('$password'),'$fullname','$birthdate','$email','$avatar',$gender,'$about')");

header("location:index.php?status=4");

?>
