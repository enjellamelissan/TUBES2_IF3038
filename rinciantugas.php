<?php
session_start();
if(!isset( $_SESSION['myusername'])){
	header("location:index.php?status=3");
}
$id_task= $_GET['id'];
$host="localhost"; // Host name 
$username="progin"; // Mysql username 
$password="progin"; // Mysql password 
$db_name="progin_405_13510011"; // Database name

// Connect to server and select databse.
$con=mysqli_connect($host,$username,$password,$db_name);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

// Get task
$result1=mysqli_query($con,"SELECT * FROM `tasks` WHERE id=$id_task");
$task = mysqli_fetch_array($result1);
$id_creator = $task['creator'];

// Get creator
$result2=mysqli_query($con,"SELECT * FROM `members` WHERE id=$id_creator");
$creator = mysqli_fetch_array($result2);

// Get assignee
$result3=mysqli_query($con,"SELECT * FROM `assignees` WHERE task=$id_task");
$count_assignee = 0;
while ($assigned = mysqli_fetch_array($result3)) {
	$id_assignee = $assigned['member'];
	$result4=mysqli_query($con,"SELECT * FROM `members` WHERE id=$id_assignee");
	$assignee[$count_assignee] = mysqli_fetch_array($result4);
	$count_assignee++;
}

// Get tags
$result5=mysqli_query($con,"SELECT * FROM `tags` WHERE tagged=$id_task");
$count_tag = 0;
while ($tagged = mysqli_fetch_array($result5)) {
	$tag[$count_tag] = $tagged['name'];
	$count_tag++;
}

// Get attachments
$result6=mysqli_query($con,"SELECT * FROM `attachments` WHERE task=$id_task");
$count_attachment = 0;
while ($attachment[$count_attachment] = mysqli_fetch_array($result6)) {
	$count_attachment++;
}

// Get comments
$result7=mysqli_query($con,"SELECT * FROM `comments` WHERE task=$id_task");
$count_comment = 0;
while ($commented = mysqli_fetch_array($result7)) {
	$comment[$count_comment] = $commented;
	$id_commenter = $commented['member'];
	$result8=mysqli_query($con,"SELECT * FROM members WHERE id=$id_commenter");
	$commenter[$count_comment] = mysqli_fetch_array($result8);
	$count_comment++;
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
							<?php echo $task['name'];?>
						</div>
                                            <div id ="dashboardimage"><img src="images/Prog_In.png" alt="dashboardimgprogin"/></div>
						<div class="isi">
</video>
						</div>
                        
						<div class="detail">
							<div class="byon">
								Posted by <strong><span class="by"><?php echo $creator['username'];?></span></strong> on <strong><?php echo $task['timestamp'];?></strong>
							</div>
							
							<div class="byon">
								Deadline : <strong><?php echo $task['deadline'];?></strong>
							</div>
							
							<div class="byon">
								Assignee : <strong>
								<?php
								for ($i = 0; $i < $count_assignee; $i++) {
									$current=$assignee[$i];
									echo $current['username'];
									if ($i < $count_assignee - 1) echo ", ";
								}
								?>
								</strong>
							</div>
							
                                                        <div class="byon">
								Tag : <strong>
								<?php
								for ($i = 0; $i < $count_tag; $i++) {
									echo $tag[$i];
									if ($i < $count_tag - 1) echo ",";
								}
								?>
								</strong>
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
							<?php
							for ($i = 0; $i < $count_attachment; $i++) {
								$current = $attachment[$i];
								if (strcmp($current['filetype'],"file") == 0) {
									$pos = strrpos($current['path'],"/");
									if ($pos === false) {
										$filename = $current['path'];
									} else {
										$filename = substr($current['path'],$pos + 1);
									}
							?>
							<a href="<?php echo $current['path'];?>"><?php echo $filename;?></a><br />
							<?php
								} else if (strcmp($current['filetype'],"image") == 0) {
							?>
							<img src="<?php echo $current['path'];?>" /><br />
							<?php	
								} else if (strcmp($current['filetype'],"video") == 0) {
							?>
							<video width="320" height="240" controls src="<?php echo $current['path'];?>"></video><br />
							<?php	
								}
							}
							?>
							<!--<a href="images/Up.png" target="images/Up.png">Up.png</a><br><img src="images/gajah.png"></img><br><video width="320" height="240" controls src="images/movie.ogg"></video>-->
							</div>
						<div class="komen">
							<div class="komenjudul">Comments</div>
							<div id="konten-commenter">
								<strong><span id="jmlkomen"><?php echo $count_comment;?></span></strong> comments
							</div>
							<div class="line-konten"></div>
							<div id="lkomen">
								<?php
								for ($i = 0; $i < $count_comment; $i++) {
									$current1=$comment[$i];
									$current2=$commenter[$i];
									echo '<div class="komen-nama">'.$current2['fullname'].'</div>';
									echo '<div class="komen-tgl">'.$current1['timestamp'].'</div>';
									echo '<div class="komen-isi">'.$current1['comment'].'</div>';
									echo '<div class="line-konten"></div>';
								}
								?>
								<!--<div class="komen-nama">Vincentius Martin</div>
								<div class="komen-tgl">| February 20, 2013 at 12:51</div>
								<div class="komen-isi">Waaah...IMBA!!</div>
								<div class="line-konten"></div>
								<div class="komen-nama">Kevin Jangtjik</div>
								<div class="komen-tgl">| February 20, 2013 at 20:01</div>
								<div class="komen-isi">Kyaya...kyaaaa...</div>
								<div class="line-konten"></div>
								<div class="komen-nama">Enjella</div>
								<div class="komen-tgl">| February 20, 2013 at 23:59</div>
								<div class="komen-isi">Finally, it works !</div>
								<div class="line-konten"></div>-->
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
<?php mysqli_close($con);?>
