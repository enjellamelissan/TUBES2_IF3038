<div id="little">
</div>
<div id="siteinfo">
  &copy; 2013. Sukasukague.<br />
	Enjella.Danny.Arya
</div>
<div id="botlink">
<ul>
	<? if (!isset($_SESSION['username'])) { ?>
		<li><a href="index.php">DASHBOARD</a></li>
		<li><a href="register.php">REGISTER</a></li>
	<? } else { ?>
		<li><a href="index.php">DASHBOARD</a></li>
		<li><a href="profil.php?uid=<? echo $_SESSION['username']?>">PROFIL</a></li>
	<? } ?>	
</ul>
</div>
