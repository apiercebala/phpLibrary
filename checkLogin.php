<?php
//read users data from database
//return json object with success/failure info
$return = array(
	"status"=>false
);

$username = "dbu319t25";
$password = "Metr?b5d";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db319t25";

$clientUserName = $_POST['name'];
$clientPassword = $_POST['password'];

$conn = new mysqli($dbServer,$username,$password,$dbName);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//   echo "Connected successfully<br>";
// }

//get username and password from users database
$sql = "SELECT userName, Password FROM users";
$result = $conn->query($sql);

//if there are users, parse through to check if username is present
if($result->num_rows > 0){

	while($row = $result->fetch_assoc()){
		echo $row["userName"];
		if( (strcmp($row["userName"],'$clientUserName') == 0) && (strcmp($row["Password"],'$clientPassword') == 0) ){
			$return["status"] = true;
		}
	}
}

//return the JSON object of the php array $return
//echo json_encode($return);

?>