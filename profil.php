<?php
session_start();
if(!isset( $_SESSION['myusername'])){
	header("location:index.php?status=3");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<title>TUBESPROGIN - HOME</title>
		<link rel="stylesheet" type="text/css" href="style.css" title="style1" />
		<link rel="stylesheet" type="text/css" href="style2.css" title="style2" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body id="profilbackground">
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="dashboard.php"><img src="images/logo.png" alt="Logo" width="300" height="100" /></a>
				</div>
				<div id="menu">
					<ul>
						<li id="menuhome2"><a href="dashboard.php">DASHBOARD</a></li>
						<li id="menudkonten"><a href="profil.php">PROFIL</a></li>
						<li id="menuregister2"><a href="logout.php">LOGOUT</a></li>
					</ul>
                                    <div class ="searchoption">
                                        <input class="searchbox" type="text" value="Input search" onfocus="searchFocus(this)" onblur="searchBox(this)" />
                                    </div>
				</div>
			</div>
		</div>
		
		<div id="main">
				<div id="konten">
					<div class="atas">
					</div>
					<div class="tengah">
						<div class="judul">
							PROFIL
						</div>
						<div class="isi">
							<img src=<?php echo $_SESSION['avatar'];?> alt="avatar"/>
						</div>
						
						<div id="profiledetail">
						<div class="profilefont"> Username		: <?php echo $_SESSION['myusername'];?> </div>
						<div class="profilefont"> Nama Lengkap	: <?php echo $_SESSION['fullname'];?> </div>
						<div class="profilefont"> Tanggal lahir : <?php echo $_SESSION['birthdate'];?> </div>
						<div class="profilefont"> Email			: <?php echo $_SESSION['email'];?> </div>
						<div class="profilefont"> Jenis Kelamin : <?php if ($_SESSION['gender'] == 'M') echo 'laki-laki'; else echo 'perempuan';?> </div>
                        <div class="profilefont"> Tugas :
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

							$member_id=$_SESSION['id'];
							$result1=mysqli_query($con,"SELECT * FROM `assignees` WHERE member=$member_id");
							$count=mysqli_num_rows($result1);
							if ($count > 0) {
								echo '<br /><ol>';
								while ($row=mysqli_fetch_array($result1)) {
									$task_id=$row['task'];
									$result2=mysqli_query($con,"SELECT * FROM tasks WHERE id=$task_id");
									$task=mysqli_fetch_array($result2);
									echo '<li>'.$task['name'].'</li>';
								}
								echo '</ol>';
							}

							mysqli_close($con);
                        ?>
                        </div>
						<div class="profilefont"> About me		: <?php echo $_SESSION['about'];?> </div>
						<div class="register-submit"><input type="button" name="register" value="Edit" disabled="able" id="form-button"  /></div>
						</div>
						
						
					<div class="bawah">
					</div>
				</div>
				</div>
		
			<div id="footer">
				<div id="little">
				</div>
				<div id="siteinfo">
					&copy; 2013. Sukasukaguelah.<br />
					Hak cipta dilindung oleh Gue.
				</div>
				<div id="botlink">
					<ul>
						<li><a href="dashboard.php">DASHBOARD</a></li>
						<li><a href="profil.php">PROFIL</a></li>
						<li><a href="javascript:void(0)" onclick="validateLogout()">LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="profil.js"></script>
	</body>
</html>
