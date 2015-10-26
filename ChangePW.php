<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "12122", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
?>
Change password form
<hr>

<?PHP
	if(isset($_POST['confirm'])){
		$old_password = trim($_POST['old_password']);
		$new_password = trim($_POST['new_password']);
		$renew_password = trim($_POST['renew_password']);
		$query = "SELECT * FROM LOGIN WHERE password='$old_password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		$query = "UPDATE LOGIN SET password='$new_password' WHERE password='$old_password'";
		if($row && ($new_password == $renew_password)){
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			echo '<script>window.location = "Login.php";</script>';
		}else{
			echo "Change password fail.";
		}
	};
	oci_close($conn);
?>

<form action='ChangePW.php' method='post'>
	Old Password<br>
	<input name='old_password' type='password'><br>
	New Password<br>
	<input name='new_password' type='password'><br>
	Confirm Password<br>
	<input name='renew_password' type='password'><br><br>
	<input name='confirm' type='submit' value='Confirm'>
</form>
