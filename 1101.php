<?php
$host='10.6.204.209'; 
$name='tina'; 
$pwd='w7a8n2139t9i6na';
$db='webappdb'; 

$response = array();

$conn = mysqli_connect($host, $name, $pwd, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT name,user_name,user_pass FROM user_info LIMIT 1,1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)) {
    
$response["products"] = array();

    while($row = mysqli_fetch_assoc($result)) {

    $product = array();
    $product["name"] = $row["name"];
    $product["user_name"] = $row["user_name"];
    $product["user_pass"] = $row["user_pass"];
	array_push($response["products"], $product);
} 
    echo json_encode($response);

} else {

    echo "0 results";
}
mysqli_close($conn);
?>