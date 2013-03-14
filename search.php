<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<? session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<title>TUBESPROGIN - search</title>
		<link rel="stylesheet" type="text/css" href="style.css" title="style1" />
		<link rel="stylesheet" type="text/css" href="style2.css" title="style2" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body id="dashboardbackground">
		<div id="wrapper">
			<div id="header"><? include('header.php'); ?></div>
			<div id="main">
				<div id="konten">
				<?php
					require("dbfunc.php");
					$q = $_GET['q'];	// searchbar
					$o = $_GET['o'];	// searchopt
					
					if ((strcmp($o, "All") == 0) || (strcmp($o, "User") == 0)) {
						$qres = mysql_query("SELECT * FROM user WHERE username LIKE '%$q%' OR email LIKE '%$q%' OR nama_lengkap LIKE '%$q%' OR about LIKE '%$q%'");
					
						echo "<div class='atas-search'></div>";
						echo "<div class='tengah'>";
						echo "<div id='search-judul'>SEARCH RESULT</div>";
						echo "<div id='search-keyword'>Keyword: ".$q."</div>";
						while($row = mysql_fetch_array($qres))
						{
								echo "<div class='line-konten'></div>";
								echo "<div class='judul'>";
									echo "<p class='alignleft'><span id='searchtype'>[User] </span><a href='profile.php?uid=".$row['username']."'>".$row['username']."</a></p>";
									echo "<p class='alignright'><img class='search-img' align='middle' src='ava/".$row['username'].".jpg' alt='avatar'/></p>";
									echo "<div style='clear: both;'></div>";
								echo "</div>";
						}
						if (strcmp($o, "User") == 0) {
							echo "</div>";
							echo "<div class='bawah-search'></div>";
						}
					}
					
					if ((strcmp($o, "All") == 0) || (strcmp($o, "Content") == 0)) {
						$qres = mysql_query("SELECT * FROM konten WHERE judul LIKE '%$q%' OR tag LIKE '%$q%'");
						
						if (strcmp($o, "Content") == 0) {
							echo "<div class='atas-search'></div>";
							echo "<div class='tengah'>";
							echo "<div id='search-judul'>SEARCH RESULT</div>";
						}
						while($row = mysql_fetch_array($qres))
						{
								echo "<div class='line-konten'></div>";
								echo "<table class='search-table' border='0' width='670px'><tr>";
									echo "<td>";
										echo "<div class='judul'>";
											echo "<span id='searchtype'>[Content] </span><a href='konten.php?jd=".$row['judul']."'>".$row['judul']."</a>";
										echo "</div>";
										echo "<div class='detail'>";
											echo "<div>";
												echo "Tags : ".$row['tag'];
											echo "</div>";
											echo "<div class='count'>";
												echo "<strong><span>".$row['jmlLike']."</span></strong> likes";
											echo "</div>";
											echo "<div class='dkonten-clear'>";
											echo "</div>";
										echo "</div>";
									echo "</td>";
									echo "<td align='right'>";
										//isi if 1 then link, 2 then gambar, 3 then video
										$tipe=$row['tipe'];
										switch ($tipe){
											case 1:	//link
												echo "<img src='images/link.png'/>";
												break;
											case 2:	//gambar
												echo "<img class='search-img' src='konten/".$row['judul'].".jpg' alt='".$row['judul']."'/>";
												break;
											case 3:	//video
												echo "<img src='images/video.png'/>";
												break;
											default:
												break;
										}
									echo "</td>";
								echo "</tr></table>";
						}
						echo "</div>";
						echo "<div class='bawah-search'></div>";
					}
				?>
			</div>
			<div id="footer"><? include('footer.php'); ?></div>
		</div>
	</body>
</html>
