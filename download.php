<?php


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $column = $_GET["column"];
    $tableName = $_GET["table"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Live";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqlFetchBlob = "SELECT $column FROM `$tableName` WHERE id = $id";
    $result = $conn->query($sqlFetchBlob);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $blobData = $row[$column];
        header('Content-Type: image/jpeg'); 
        echo $blobData;
    } else {
        echo "Image data not found.";
    }
    $conn->close();
}
?>
