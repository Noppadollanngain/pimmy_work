<?php 
	session_start();
	if ($_SESSION['statusadmin']==0) {
		echo "<script>window.location.href = '../login.html';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>