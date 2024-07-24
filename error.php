<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="loginstyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('Designer1.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
          
            font-family: 'Audiowide', sans-serif;
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
            background-color: #ffffff; 
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
            background-color: #3498db;
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
            width: 93%;
            letter-spacing: 1px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        form input[type="date"] {
            display: inline-block;
        }

        form button {
            background-color: #3498db; 
            color: #fff;
            margin-left: 24px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #2980b9; 
        }
        h3{
            letter-spacing:2px;
        }
    </style>
</head>
<body>
    <center>
         <img src="emoji.png" width="500px" height="500px" /><br>
    <h3>DATE ERROR</h3>
    </center>
   
</body>
</html>
