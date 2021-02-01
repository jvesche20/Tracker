<body style="background-color:cornflowerblue; color:white;">
<a href="../"><b>Go back</b></a><br />
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');






if(isset($_GET['updated'])) {
    if ($_GET['updated'] == "1") {
        echo 'Update successful!';
    }
}


// Create a query for the database
$query = "SELECT id, username, password, email, age, sex, phone_number, birthdate,
	ip FROM account";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr>
<td align="left"><b>Edit</b></td>
<td align="left"><b>Delete</b></td>
<td align="left"><b>ID</b></td>
<td align="left"><b>Username</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Age</b></td>
<td align="left"><b>Sex</b></td>
<td align="left"><b>Phone Number</b></td>
<td align="left"><b>Birth Date</b></td>
<td align="left"><b>IP</b></td>
<td align="left"><b>View IPs</b></td>

</tr>';

$total_lunch_cost = 0;

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
	
	

echo '<tr><td align="left">' . 
'<a href="edit.php?id=' . $row['id']  . '">Edit</a>' . '</td><td align="left">' . 
'<a href="delete.php?id=' . $row['id']  . '">Delete</a>' . '</td><td align="left">' . 
$row['id'] . '</td><td align="left">' . 
$row['username'] . '</td><td align="left">' . 
$row['email'] . '</td><td align="left">' .
$row['age'] . '</td><td align="left">' . 
$row['sex'] . '</td><td align="left">' .
$row['phone_number'] . '</td><td align="left">' . 
$row['birthdate'] . '</td><td align="left">' .
$row['ip'] . '</td><td align="left">' .
'<a href="getips.php?id=' . $row['id']  . '">Show List</a>' . '</td><td align="left">'; 


echo '</tr>';
}

echo '</table>';



} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>
</body>