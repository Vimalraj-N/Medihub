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
</head>
<body>
    <div class="desktop">
        <div class="overlap-group-wrapper">
            <div class="overlap-group">
                <div class="rectangle"></div>
                <div class="text-wrapper">FILL THE DETAILS</div>
                <div class="div">MEDIHUB</div>
                <form method="post" action="process_form_report.php" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="<?php echo $_GET['table']; ?>">
                    <input type="number" name="blood_sugar" placeholder="Blood Sugar" required />
                    <input type="number" name="BP" placeholder="BP" required />
                    <input type="number" name="cholesterol" placeholder="Cholesterol" required />
                    <input type="number" name="WBC" placeholder="WBC" required />
                    <input type="number" name="RBC" placeholder="RBC" required />
                    <input type="date" name="report_date" />
                    <button type="submit" class="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
