<?php

$username = "dbu319t25";
$password = "Metr?b5d";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db319t25";

$conn = new mysqli($dbServer,$username,$password,$dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$bookId = $_POST['id'];

$sql3 = "SELECT ShelfId from shelves where BookId=$bookId";
$shelf = $conn->query($sql3);

if($shelf->num_rows > 0){
	$sql = "DELETE from books where BookId=$bookId";
	$sql2 = "DELETE from shelves where BookId=$bookId";

	if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
	    $book["status"] = true;
	} else {
		$book["error"] = "Error: " . $sql . "<br>" . $conn->error;
	}
}
$book = array(
	"status"=>false,
	"shelf"=>$shelf
);

mysqli_close($conn);

echo json_encode($book);
?>