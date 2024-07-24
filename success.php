<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentDate = date("Y-m-d");

$sql = "SELECT * FROM events WHERE date1 >= '$currentDate'";
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

            width:100%;
            height:100%;
        }
       .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 1000px;
            /* box-shadow: 0 4px 8px 0 rgba(255,255,255,0.6); */
            transition: 0.3s;
            background-color:rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            .shine {
            position: absolute;
            top: -10%;
            left: -50%;
            width: 200%;
            height: 300%;
            background: rgba(255, 255, 255,0.6);
            animation: shine-animation 2.5s infinite linear;
            transform: rotate(-45deg);
            z-index: 1;
        }
        

        }
         @keyframes shine-animation {
            0% {
                transform: rotate(-45deg) translate(-200%, -200%);
            }
            100% {
                transform: rotate(-45deg) translate(200%, 200%);
            }
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        p 
        {
            letter-spacing:2px;
        }

       
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                       <div class="shine"></div> 
                    <h2><center><?php echo $row["date1"]; ?></center></h2>
                    <p>LOCATION : <?php echo $row["location1"]; ?></p>
                    <p><strong>HOSPITAL :</strong> <?php echo $row["hospital"]; ?></p>
                    <p><strong>PHONE :</strong> <?php echo $row["phone"]; ?></p>
                    <p><strong>DESCRIPTION :</strong> <?php echo $row["description1"]; ?></p>
                </div>
                <?php
            }
        } else {
            header("Location:./error.php");
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
