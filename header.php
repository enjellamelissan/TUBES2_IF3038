<?php
  $currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$filename = $parts[count($parts) - 1];
?>
<div id="logo">
	<a href="dashboard.php"><img src="images/logo.png" alt="Logo" width="300" height="100" /></a>
</div>
<div id="menu">
	<ul>
		<li id="menudb<? if ($filename != "dashboard.php") echo'2'?>"><a href="index.php">DASHBOARD</a></li>
		<li id="menuprof<? if ($filename != "profil.php") echo'2'?>"><a href="dkonten.php">PROFIL</a></li>
		<? if (!isset($_SESSION['username'])) { ?>
			<li id="menuregister<? if ($filename != "register.php") echo'2'?>"><a href="register.php">REGISTER</a></li>
		<? } else { ?>
			<li id="menuprofil<? if ($filename != "profil.php") echo'2'?>"><a href="profile.php?uid=<? echo $_SESSION['username']?>">PROFILE</a></li>
		<? } ?>
	</ul>
</div>
<div id="usearch">
	<ul>
		<li id="user">
		<? if (!isset($_SESSION['username'])) { ?>
		<b>
			USERNAME <input id="username" class="textfld" type="text" name="username"/>
			<input onclick="login()" class="btn" type="submit" value="Login"/></br>
			PASSWORD <input id="passwd" class="textfld" type="password" name="passwd"/>
			<div id="loginResultDiv">
			</div>
		</b>
		<? } else { ?>
			<table border="0">
				<tr>
					<td rowspan="2" width="45"><img src="ava/<?echo $_SESSION['username']?>.jpg" alt="avatar" class="ava-img"/></td>
					<td>Welcome, <b><?echo $_SESSION['username']?></b>!</td>
				</tr>
				<tr>
					<td><a href="prologout.php">logout</a></td>
				</tr>
			</table>
		<? } ?>
		</li>
		<li id="search">
			<i>Search</i> <input id="searchbar" class="textfld" type="text" name="search"/>
			<select id="searchopt">
				<option>All</option>
				<option>User</option>
				<option>Content</option>
			</select>
			<input onclick="search()" class="btn" type="submit" value="Search"/>
		</li>
	</ul>
</div>
