<?php
session_start();
if(!isset( $_SESSION['myusername'])){
	header("location:index.php?status=3");
}
$host="localhost"; // Host name 
$username="progin"; // Mysql username 
$password="progin"; // Mysql password 
$db_name="progin_405_13510011"; // Database name

// Connect to server and select databse.
$con=mysqli_connect($host,$username,$password,$db_name);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT DISTINCT `category` FROM `tasks`");
$cats=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<title>TUBESPROGIN - rinciantugas</title>
		<link rel="stylesheet" type="text/css" href="style.css" title="style1" />
		<link rel="stylesheet" type="text/css" href="style2.css" title="style2" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body id="dashboardbackground">
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="dashboard.php"><img src="images/logo.png" alt="Logo" width="300" height="100" /></a>
				</div>
				<div id="menu">
					<ul>
						<li id="menudb"><a href="dashboard.php">DASHBOARD</a></li>
						<li id="menuprof"><a href="profil.php">PROFIL</a></li>
						<li id="menulo"><a href="logout.php">LOGOUT</a></li>
						<!--search masih belum nih-->
					</ul>
                                    <div class ="searchoption">
                                        <input class="searchbox" type="text" value="Input search" onfocus="searchFocus(this)" onblur="searchBox(this)" />
                                    </div>
                                 </div>
			</div>
			
			<div id="main2">
                            <div id ="dashboardcontainer">
                                <div id ="staticcomponentlist">
                                    <div class ="letterpanel">
                                    <a href="#login_form" id="login_pop">Kategori</a>
                                    </div>
                                    <!-- popup form #1 jadi ceritanya awalnya gk keliatan -->
                                    <a href="#x" class="overlay" id="login_form"></a>
                                    <div class="popup">
                                        <h2>Tambah Kategori Tugas</h2>
                                        <!--<h2>Welcome Guest!</h2>
                                        <p>Please enter your login and password here</p>-->
                                        <div>
                                            <label>Nama Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                                            <input type ="text" name="category"></input>
                                        </div>
                                        <div>
                                            <label for="password">Pengguna Terkait :</label>
                                            <input type ="text" name="relateduser"></input>
                                        </div>
                                        <input type="button" value="Ok" />

                                        <a class="close" href="#close"></a>
                                    </div>
                                    <?php                                    
									$id = $_SESSION['id'];
									$result1=mysqli_query($con,"SELECT * FROM `tasks` WHERE creator='$id'");
									while ($row=mysqli_fetch_array($result1)) {
                                    ?>
                                    <!--<a href ="rinciantugas.php">
                                        <img onmouseover="javascript:getDashboardFocus('task1');" src ="images/Prog_In.png" id="task1" alt="task" style="cursor:pointer" />
                                    </a>
                                    <a href ="post.php"><input id ="newtask" type="button" name="Tugas Baru" value="newtask" disabled="true"/></a>
                                    <img onmouseover="javascript:getDashboardFocus('task2');" src ="images/dateschedule.png" id="task2" alt="task2" style="cursor:pointer" />
                                    <a href ="post.php"><input id ="newtask" type="button" name="Tugas Baru" value="newtask" disabled="true"/></a>-->
                                    <div onmouseover="javascript:showtask(<?php echo $row['category'];?>,<?php echo $cats;?>);"><?php echo $row['name'];?></div>
                                    <a href ="post.php"><input id ="newtask" type="button" name="Tugas Baru" value="newtask"/></a>
                                    <?php
									}
                                    ?>
                                </div>
                                <div id="rincian">
									<?php
									//$result2=mysqli_query($con,"SELECT DISTINCT `category` FROM `tasks`");
									//while ($category=mysqli_fetch_array($result2)) {
									for ($idc=1; $idc<=$cats; $idc++) {
										// $idc = $category['category'];
										echo "<div id='".$idc."'>";
										$result3=mysqli_query($con,"SELECT * FROM `tasks` WHERE category='$idc'");
										while ($task=mysqli_fetch_array($result3)) {
											echo "<a href='rinciantugas.php'>".$task['name']."</a><br />";
										}
										echo "<br /></div>";
									}
									?>
                                    <!--end of pop up-->
                                    <div class="atas"></div>
									<div class="tengah"><img src ="images/ProginBig.png" alt="task" />
									<img src ="images/DateBig.png" alt="tasklv" /></div>
									<div class="bawah"></div>;
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
                </div>
	</body>
</html>
