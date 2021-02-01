<?php
		require_once('../mysqli_connect.php');
		
		$id = trim($_GET['id']);
		
		
		
		
		
		
		
		
		
		
		
		
		
		$query = "DELETE FROM account WHERE id=?";
		
		$stmt = mysqli_prepare($dbc, $query);
		
		mysqli_stmt_bind_param($stmt, "i", $id);
		
		mysqli_stmt_execute($stmt);
		
		echo mysqli_error($dbc);
?>
<html>
<head>
<title>User Deleted</title>
</head>
<body style="background-color:crimson;">
<a href="getinfo.php"><b>Go back</b></a><br /><br />
<a href="../"><b>Go home</b></a><br /><br />
<br /><br />
The user has been deleted.
</body>
</html>