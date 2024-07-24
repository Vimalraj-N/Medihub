<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-nENoxz78R7L6lpsa2TMF8V2jN7t8exWe9O1oT5F6BB7XNS5M6QkMOcAUn9U+0F5n+6bKTVFVsS9gzmWtzVBY7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
 <style>
    body{
             background-image: url('Designer1.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* backdrop-filter: blur(4px) brightness(80%);  */
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color:rgba(0,0,0,0.7);
            margin: 0;
            letter-spacing:1px;
            width:100%;
            height:100%;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 15px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            font-size:15px;
        }

        th,
        td {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 20px;
            font-size:15px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-size:15px;
            color:black;
        }

      
        tr:hover {
            background-color:rgba(0, 0, 0,0.2);
            /* color:white; */
        }
        a
        {
            text-decoration:none;
           color:rgba(0,0,0,0.7);
        }
        a:hover{
            color:red;
        }
        h2{
            font-size: 30px;
            font-weight: 900;
            color: #333;
            font-family: 'Audiowide', sans-serif;
            text-align: center;
        }
        </style>
<body>
   <h2 style="letter-spacing:2px;">UPDATE & DELETE</h2>
    <center>
        
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Location</th>
            <th>Hospital</th>
            <th>Phone</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["date1"] . "</td>";
                echo "<td>" . $row["location1"] . "</td>";
                echo "<td>" . $row["hospital"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["description1"] . "</td>";
                echo "<td>";
                echo "<a href='uphp_event.php?id=" . $row["id"] . "'>Update</a><br>";
                // echo " | ";
                echo "<a href='e_delete.php?id=" . $row["id"] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No events found</td></tr>";
        }
        ?>
    </table>
    </center>
</body>
</html>

<?php
$conn->close();
?>
