<?php
session_start();
if(!isset( $_SESSION['myusername'])){
	header("location:index.php?status=3");
}
?>
<!-- created by Enjella-->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<title>TUBESPROGIN - RINCIANTUGAS</title>
		<link rel="stylesheet" type="text/css" href="style.css" title="style1" />
		<link rel="stylesheet" type="text/css" href="style2.css" title="style2" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	
	<body id="rincianbackground">
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
					
					<div class ="searchoption">
                    <input class="searchbox" type="text" value="Input search" onfocus="searchFocus(this)" onblur="searchBox(this)" />
                    </div>
					
				</div>
			</div>
			<div id="main">
				<div id="konten">
					<div class="atas">
					</div>
					<div class="tengah">
						<div class="judul">
							Pemrograman Internet
						</div>
                                            <div id ="dashboardimage"><img src="images/Prog_In.png" alt="dashboardimgprogin"/></div>
						<div class="isi">
</video>
						</div>
                        
						<div class="detail">
							<div class="byon">
								Posted by <strong><span class="by">Enjella</span></strong> on <strong>February 20, 2013</strong>
							</div>
							
							<div class="byon">
								Deadline : <strong>February 25, 2013</strong>
							</div>
							
							<div class="byon">
								Assignee : <strong>Vincen, Kevin</strong>
							</div>
							
                                                        <div class="byon">
								Tag : <strong>html, css, javascript</strong>
							</div>
                                                    
							<div class="likedislike">
								<ul class="ldbuttons">
									<li class="like" id="blike"><a href="javascript:like();void(0);"></a></li>
									<li class="dislike" id="bdislike"><a href="javascript:dislike();void(0);"></a></li>
								</ul>
							</div>
							<div class="count">
								<strong><span id="jmllike"></span></strong> likes
							</div>
                            
                            <div class="count"><input type="button" name="edit" onclick="editTask()" value="Edit"/></div>
                            
						</div><br><br><br><div class="videomode" align="center"> <br> Attachment : 
							<a href="images/Up.png" target="images/Up.png">Up.png</a><br><img src="images/gajah.png"></img><br><video width="320" height="240" controls src="images/movie.ogg"></video></div>
						<div class="komen">
							<div class="komenjudul">Comments</div>
							<div id="konten-commenter">
								<strong><span id="jmlkomen">3</span></strong> comments
							</div>
							<div class="line-konten"></div>
							<div id="lkomen">
								<div class="komen-nama">Vincentius Martin</div>
								<div class="komen-tgl">| February 20, 2013 at 12:51</div>
								<div class="komen-isi">Waaah...IMBA!!</div>
								<div class="line-konten"></div>
								<div class="komen-nama">Kevin Jangtjik</div>
								<div class="komen-tgl">| February 20, 2013 at 20:01</div>
								<div class="komen-isi">Kyaya...kyaaaa...</div>
								<div class="line-konten"></div>
								<div class="komen-nama">Enjella</div>
								<div class="komen-tgl">| February 20, 2013 at 23:59</div>
								<div class="komen-isi">Finally, it's work !</div>
								<div class="line-konten"></div>
							</div>
							<form action="" method="get">
								<div id="komen-tulis"><strong>Tulis Komentar</strong></div>
								<div class="clear"></div>
								<div class="komen-label btg-mrh" id="komen-btg">*) wajib diisi</div>
								<div class="clear"></div>
								<div class="komen-label">Nama <span class="btg-mrh">*</span></div><div class="register-td">:</div><div class="register-input"><input class="register-input-input" type="text" name="nama" id="form-nama" /></div>
								<div class="clear error" id="error-username"></div>
								<div class="komen-label">Komentar <span class="btg-mrh">*</span></div><div class="register-td">:</div><div class="register-input"><textarea name="komentar" rows="3" cols="50" id="form-komen"></textarea></div>
								<div class="clear"></div>
								<div class="komen-submit"><input type="button" name="submit" onclick="commenting()" value="Submit" /></div>
							</form>
						</div>
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
		<script type="text/javascript" src="rinciantugas.js"></script>
	</body>
</html>