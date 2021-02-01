<body style="background-color:cornflowerblue; color:white;">
<a href="getinfo.php"><b>Go back</b></a><br />
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');






if(isset($_GET['updated'])) {
    if ($_GET['updated'] == "1") {
        echo 'Update successful!';
    }
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	// Create a query for the database
	$select_query = "SELECT id,ip FROM iplist
	WHERE id = '$id'
	";
        
        $response = @mysqli_query($dbc, $select_query);
	if($response){
		while($row = mysqli_fetch_array($response)){
?>


<?php
		}
	}
}
else{
	die("Param id not provided.");
}

// Create a query for the database
$query = "SELECT id,ip FROM iplist WHERE id ='$id'";
$query2 = "SELECT id, ip FROM account";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr>

<td align="left"><b>ID</b></td>
<td align="left"><b>IP</b></td>
<td align="left"><b>Info</b></td>

</tr>';



// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
	
	

echo '<tr><td align="left">' . 
 
$row['id'] . '</td><td align="left">' . 
$row['ip'] . '</td><td align="left">' .
'<a href="ipinfo.php?id=' . $row['id']  . '">View Info</a>' . '</td><td align="left">'; 


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