<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $table = $_POST["table"];
    $blood_sugar = $_POST["blood_sugar"];
    $BP = $_POST["BP"];
    $cholesterol = $_POST["cholesterol"];
    $WBC = $_POST["WBC"];
    $RBC = $_POST["RBC"];
    $report_date = $_POST["report_date"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "report";

 
    $conn = new mysqli($servername, $username, $password, $dbname);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE $table SET blood_sugar=$blood_sugar,BP=$BP,cholesterol=$cholesterol,";

    if ($conn->query($sql) === TRUE) {
        //echo "Data inserted successfully!";
         header("Location: ./display1.php?table=$table");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>
