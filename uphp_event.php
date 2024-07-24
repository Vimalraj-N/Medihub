<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $sql = "SELECT * FROM events WHERE id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $date = $row['date1'];
        $location = $row['location1'];
        $hospital = $row['hospital'];
        $phone = $row['phone'];
        $description = $row['description1'];
    } else {
        echo "Record not found.";
    }
}


$conn->close();
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
    
</head>
<style>
 body {
            background-image: url('Designer1.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* backdrop-filter: blur(4px) brightness(80%); */
            font-family: 'Poppins', sans-serif;
           padding:100px;
           
        }

        .desktop {
            display: flex;
            justify-content: center;
            align-items: center;
           
           
            
        }

        .overlap-group-wrapper {
            width: 700px;
           
           
        }

        .overlap-group {
            
            position: relative;
            background-color: rgba(255,255,255,0.8); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .rectangle {
             
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            /* background-color: rgba(1,1,1,0.0); ; */
            border-radius: 10px;
            z-index: -1;
        }

        .text-wrapper {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-top: 10px;
            text-align: center;
            letter-spacing: 2px;
        }

        .div {
            font-size: 30px;
            font-weight: 900;
            color: #333;
            font-family: 'Audiowide', sans-serif;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }
    
        form input, form button {
            margin-top: 10px;
            margin-bottom: 15px;
            background-color:rgba(1,1,1,0.1);
            
            width: 93%;
            letter-spacing: 1px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
        input:visited
        {
          background-color:#ffffff;
        } 
        form input[type="date"] {
            display: inline-block;
        }
        form input[name="description"]
        {
           height:200px;
        }

        form button {
            background-color: rgb(137, 180, 126);; 
            color: #fff;
            margin-left: 24px;
            cursor: pointer;
        }

        form button:hover {
             border:2px solid #000000;
 
  background-color: rgb(137, 180, 126);
  color: #000000;
        }
    </style>
<body>

    <div class="desktop">
        <div class="overlap-group-wrapper">
            <div class="overlap-group">
                <div class="rectangle"></div>
                <div class="text-wrapper">UPDATE THE DETAILS</div>
                <div class="div">MEDIHUB</div>
                <form method="post" action="u_process_event.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="date" name="date" value="<?php echo $date; ?>"><br><br>
        <input type="text" name="location" value="<?php echo $location; ?>"><br><br>
        <input type="text" name="hospital" value="<?php echo $hospital; ?>"><br><br>
        <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
        <input type="text" name="description" value="<?php echo $description; ?>"><br><br>
        <button type="submit" class="submit" value="Update" name="submit">Update</button>
    </form>
            </div>
        </div>
    </div>
    
</body>
</html>
