<html>
<head>
<title>Edit Student</title>
</head>
<body style="background-color:cornflowerblue; color:white;">
<a href="../"><b>Go back</b></a><br /><br />
<?php
 require_once('../mysqli_connect.php');

if(isset($_GET['id'])){
	$student_id = $_GET['id'];
	
	// Create a query for the database
	$select_query = "SELECT id, username, password, email, age, sex, phone_number, birthdate,
	ip FROM account
	WHERE id = '$id'
	";
        
        $response = @mysqli_query($dbc, $select_query);
	if($response){
		while($row = mysqli_fetch_array($response)){
?>

<form action="editstudent.php?student_id=<?php echo $row['id']; ?>" method="post">
    
    <b>Edit an existing Student</b>

<p>ID:
<input type="text" readonly name="id" size="30" value="<?php echo $row['id']; ?>" />
</p>

<p>Username:
<input type="text" name="username" size="30" value="<?php echo $row['username']; ?>" />
</p>
<p>Password:
<input type="password" readonly name="password" size="30" value="<?php echo $row['password']; ?>" />
</p>
<p>Email:
<input type="text" name="email" size="30" value="<?php echo $row['email']; ?>" />
</p>

<p>Age:
<input type="text" name="age" size="30" value="<?php echo $row['age']; ?>" />
</p>

<p>Sex:
<input type="text" name="sex" size="30" value="<?php echo $row['sex']; ?>" />
</p>

<p>Phone Number:
<input type="text" name="phone_number" size="30" value="<?php echo $row['phone_number']; ?>" />
</p>

<p>Birth date:
<input type="text" name="birthdate" size="30" maxlength="2" value="<?php echo $row['birthdate']; ?>" />
</p>

<p>IP:
<input type="text" name="ip" size="30" maxlength="5" value="<?php echo $row['ip']; ?>" />
</p>


<p>
    <input type="submit" name="submit" value="Update" />
</p>
    
</form>
</body>
</html>

<?php
		}
	}
}
else{
	die("Param student_id not provided.");
}


if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'ID';

    } else {

        // Trim white space from the name and store the name
        $id = trim($_POST['id']);

    }

    if(empty($_POST['username'])){

        // Adds name to array
        $data_missing[] = 'Username';

    } else{

        // Trim white space from the name and store the name
        $username = trim($_POST['username']);

    }

    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }

    if(empty($_POST['age'])){

        // Adds name to array
        $data_missing[] = 'Age';

    } else {

        // Trim white space from the name and store the name
        $age = trim($_POST['age']);

    }

    if(empty($_POST['sex'])){

        // Adds name to array
        $data_missing[] = 'Sex';

    } else {

        // Trim white space from the name and store the name
        $sex = trim($_POST['sex']);

    }

    if(empty($_POST['phone_number'])){

        // Adds name to array
        $data_missing[] = 'Phone Number';

    } else {

        // Trim white space from the name and store the name
        $phone_number = trim($_POST['phone_number']);

    }

    if(empty($_POST['birthdate'])){

        // Adds name to array
        $data_missing[] = 'Birth Date';

    } else {

        // Trim white space from the name and store the name
        $birthdate = trim($_POST['birthdate']);

    }

    if(empty($_POST['ip'])){

        // Adds name to array
        $data_missing[] = 'IP';

    } else {

        // Trim white space from the name and store the name
        $ip = trim($_POST['ip']);

    }

    if(empty($_POST['password'])){

        // Adds name to array
        $data_missing[] = 'Password';

    } else {

        // Trim white space from the name and store the name
        $password = trim($_POST['password']);

    }

    
    
    if(empty($data_missing)){
		
		$query = "UPDATE accoutn SET
		username = '$username',
		password = '$l_name',
		email = '$email',
		age = '$age', sex = '$sex', phone_number = '$phone_number',
		birthdate = '$birthdate', ip = '$ip', 
		WHERE id='$id'
		";
        
        $stmt = mysqli_prepare($dbc, $query) or die(mysqli_error($dbc));
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Student Updated';
            
			header('location: getinfo.php?updated=1');
			
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>