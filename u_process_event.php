<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = $_POST["id"];
    $date = $_POST["date"];
    $location = $_POST["location"];
    $hospital = $_POST["hospital"];
    $phone = $_POST["phone"];
    $description = $_POST["description"];

    
    $sql = "UPDATE events 
            SET date1='$date', location1='$location', hospital='$hospital', phone='$phone', description1='$description'
            WHERE id=$id";

   
    if ($conn->query($sql) === TRUE) {
       
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
