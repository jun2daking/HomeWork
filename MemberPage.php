<?PHP
	session_start();
	if(empty($_SESSION['ID']) || empty($_SESSION['NAME']) || empty($_SESSION['SURNAME'])){
		echo '<script>window.location = "Login.php";</script>';
	}
?>
Member page
<hr>
<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "NAME : ".$_SESSION['NAME']."<br>";
	echo "SURNAME : ".$_SESSION['SURNAME']."<br>";
	echo "<a href='Logout.php'>Logout</a>";
?>

<form action='ChangePW.php'  method='post'>
	<input name='changepassword' type='submit' value='Change Password'>
</form>