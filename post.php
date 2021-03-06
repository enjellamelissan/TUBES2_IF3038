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
		<title>TUBESPROGIN - POST</title>
		<link rel="stylesheet" type="text/css" href="style.css" title="style1" />
		<link rel="stylesheet" type="text/css" href="style2.css" title="style2" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body id="postbackground">
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="dashboard.php"><img src="images/logo.png" alt="Logo" width="300" height="100" /></a>
				</div>
				<div id="menu">
					<ul>
						<li id="menuhome2"><a href="dashboard.php">DASHBOARD</a></li>
						<li id="menudkonten2"><a href="profil.php">PROFIL</a></li>
						<li id="menuregister2"><a href="logout.php">LOGOUT</a></li>
					</ul>
				</div>
				<div class ="searchoption">
                
				<input class="searchbox" type="text" value="Input search" onfocus="searchFocus(this)" onblur="searchBox(this)" />
                </div>
				
			</div>
			<div id="main">
				<div id="konten">
					<div class="atas">
					</div>
					<div class="tengah">
						<div class="judul" id="headerpostkonten">
							Post Tugas
						</div>
						<div class="isi">
							<form action="" method="get">
								<div class="register-label">Judul</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="judul" id="judul" onkeyup = "validatePostTask()" maxlength="25"/><div><label id="judulvalidate"> </label></div></div>
								<div class="clear error" id="error-username"></div>
								<div class="register-label">Jenis konten</div><div class="register-td">:</div><div class="register-input"><input type="radio" name="sex" id="sex-link" value="link" onclick="linkClicked();" /> Link <input type="radio" name="sex" id="sex-gambar" value="gambar" onclick="gambarClicked();" /> Gambar <input type="radio" name="sex" id="sex-video" value="video" onclick="videoClicked();" /> Video</div>
								<div class="clear" id="error-sex"></div>
								<div id="opt"></div>
								
								<div id="artikel">
									<div class="register-label">URL artikel</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="artikel" id="kontenartikel"/></div>
									<div class="clear error" id="error-artikel"></div>
									<div class="register-label">Deskripsi singkat</div><div class="register-td">:</div><div class="register-input"><textarea class="register-input-input" name="about" id="kontendeskripsi" rows="5" cols="25"></textarea></div>
									<div class="clear"></div>
								</div>
								<div id="avatar">
									<div class="register-label">File gambar</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="file" name="avatar" id="kontenavatar" /></div>
									<div class="clear" id="error-gambar"></div>
								</div>
								<div id="youtube">
									<div class="register-label">URL YouTube</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="youtube" id="kontenyoutube" /><br />
									Contoh : https://www.youtube.com/watch?v=7oqsc6ahHVI</div>
									<div class="clear error" id="error-youtube"></div>
								</div>
								
								<div class="register-label">Deadline</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="tgl" id="form-tgl" onkeyup="validate()" /></div><div id="caldad"><div id="calendar"></div><a href="javascript:showcal(2,2012);void(0);"><img src="images/cal.gif" alt="Calendar" /></a></div>
								<div class="clear" id="error-tgl"></div>
								<div class="register-label">Asignee</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="asignee" id="asignee"/></div>
								<div class="clear error" id="error-username"></div>
								<div class="register-label">Tag</div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="judul" id="judul"/><ul><div><a href="profil.php"></a></div>
								</ul></div>
															
								<div class="post-register-submit"><input type="button" id = "post1" name="post" value="OK" onclick="postContent()" disabled/></div>
							</form>
						</div>
						
						<div id="afterpost">
							<div class="judul" id="apjudul"></div>
							<div id="ap-artikel">
								<div id="ap-kontenartikel"></div>
								<div id="ap-kontendeskripsi"></div>
							</div>
							<div id="ap-avatar">
								<div id="kontengambar"><img src="images/oke.png" alt="Konten" /></div>
							</div>
							<div id="ap-youtube">
							</div>
							<div class="ap-submit"><input type="button" name="continue" value="Continue" onclick="refreshPage()"/></div>
						</div>
						
					</div>
					<div class="bawah">
					</div>
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
		<script type="text/javascript" src="post.js"></script>
	</body>
</html>