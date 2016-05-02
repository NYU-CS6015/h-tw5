<?php
// Establishing connection with server by passing database credentials.
$servername = "127.0.0.1";
$db_username = "homestead";
$db_password = "secret";
$db_name = "hackathon";
$connect = new mysqli($servername, $db_username, $db_password, $db_name);

//Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_errno());
    exit();
}

//Retrieve user id
if(isset($_POST['user_id'])) {
	$user_id = $_POST['user_id'];
}
else $user_id = "";

//Retrieve message
if(isset($_POST['message'])) {
	$message = $_POST['message'];
}
else $message = "";

$created = date("F j, Y, g:i a");  

//Insert new user query
$query = sprintf("INSERT into status_messages(user_id,messages,created_at,updated_at) VALUES(%d, '%s', '%s', '%s')",
	mysqli_real_escape_string($connect, $user_id),
	mysqli_real_escape_string($connect, $message),
	mysqli_real_escape_string($connect, $created),
	mysqli_real_escape_string($connect, $updated);

//Perform Query
if (!mysqli_query($connect,$query)) {
  die('Error: ' . mysqli_error($connect));
}

//Close connection
mysqli_close($connect); 
?>