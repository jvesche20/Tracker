<html>
<head>
<title>Add User</title>
</head>
<body style="background-color:cornflowerblue; color:white;">
<a href="../"><b>Go back</b></a><br /><br />
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['username'])){

        // Adds name to array
        $data_missing[] = 'Username';

    } else {

        // Trim white space from the name and store the name
        $username = trim($_POST['username']);

    }

    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'Id';

    } else{

        // Trim white space from the name and store the name
        $id = trim($_POST['id']);

    }

    if(empty($_POST['password'])){

        // Adds name to array
        $data_missing[] = 'Password';

    } else {

        // Trim white space from the name and store the name
        $password = trim($_POST['password']);

    }

    if(empty($_POST['sex'])){

        // Adds name to array
        $data_missing[] = 'Sex';

    } else {

        // Trim white space from the name and store the name
        $sex = trim($_POST['sex']);

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

    
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO account (id, username, password, email, age, sex, phone_number, birthdate,
		ip) VALUES (?, ?, ?,
        ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        
        mysqli_stmt_bind_param($stmt, "isssissss", $id,
                               $username, $password, $email, $age,
                               $sex, $phone_number, $birthdate, $ip);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Account Created';
            
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

<form action="http://localhost/Tracker/account/added.php" method="post">
    
    <b>Add a New User</b>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

    <p>Username
<input type="text" name="username" size="30" value="" />
</p>

<p>Password:
<input type="text" name="password" size="30" value="" />
</p>

<p>Email:
<input type="text" name="email" size="30" value="" />
</p>

<p>Age:
<input type="text" name="age" size="30" value="" />
</p>

<p>Sex:
<input type="text" name="sex" size="30" maxlength="1"= value="" />
</p>

<p>Phone Number:
<input type="text" name="phone_number" size="30" value="" />
</p>

<p>Birth Date(mm-dd-yyyy):
<input type="text" name="birthdate" size="30" value="" />
</p>

<p>IP:
<input type="text" name="ip" size="30" value="" />
</p>

<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>