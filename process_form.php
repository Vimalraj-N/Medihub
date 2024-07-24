<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $tableName = $_POST["table"];
    $hospital = $_POST["hospital"];
    $doctor = $_POST["doctor"];
    $medicalReport = uploadFile("medical_report");
    $prescription = uploadFile("prescription");
    $scanReport = uploadFile("scan_report");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Live";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqlInsertData = $conn->prepare("INSERT INTO `$tableName` (hospital, doctor, medical_report, prescription, scan_report)
                                     VALUES (?, ?, ?, ?, ?)");
    $sqlInsertData->bind_param("sssss", $hospital, $doctor, $medicalReport, $prescription, $scanReport);
    if ($sqlInsertData->execute()) {
        
         header("Location: ./display1.php?table=$tableName");
    } else {
        echo "Error inserting data: " . $sqlInsertData->error;
    }
    $sqlInsertData->close();
    $conn->close();
}

function uploadFile($inputName) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES[$inputName]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    $allowedFormats = ["jpg", "jpeg", "png", "gif", "pdf"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        $uploadOk = 0;
    }
    echo $targetFile;
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return null;
    } else {
        if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
             $fileContent = file_get_contents($targetFile);
            return $fileContent;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }
}
?>
