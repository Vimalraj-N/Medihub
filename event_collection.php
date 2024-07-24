<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $loc = $_POST["location"];
    $hos = $_POST["hospital"];
    $phone = $_POST["phone"];
    $des = $_POST["description"];

    $currentDate = date("Y-m-d");
     if ($date < $currentDate) {
         header("Location: error.php");
         echo "Error: The selected date cannot be in the past.";
         exit();
     }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "events";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO events (date1, location1, hospital, phone, description1)
            VALUES ('$date', '$loc', '$hos', '$phone', '$des')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
