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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-nENoxz78R7L6lpsa2TMF8V2jN7t8exWe9O1oT5F6BB7XNS5M6QkMOcAUn9U+0F5n+6bKTVFVsS9gzmWtzVBY7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .upload-icon {
            position: relative;
            cursor: pointer;
            color: #3498db;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: inline-block;
        }


.upload-icon::before {
    content: '\1F4EB'; 
    font-family: 'Arial', sans-serif;
    margin-right: 5px; 
   
}



        form input[type="file"] {
            display: none; 
        }
      
        .custom-file-upload {
            cursor: pointer;
            color: #3498db;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            display: inline-block;
            
        }

        .ok-message {
            display:flex;
            justify-content:center;
            align-items:center;
            position:relative;
            color: #4CAF50;
            font-weight: bold;
            margin-top: 10px;
            text-align:center;
            
        }

        form button {
            background-color:rgb(137, 180, 126);
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
                <form method="post" action="process_form.php" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="<?php echo $_GET['table']; ?>">
                    <input type="text" name="hospital" placeholder="Hospital" required />
                    <input type="text" name="doctor" placeholder="Doctor" required />
                    <label for="medical_report" class="upload-icon">Choose Medical Report</label>
                    <input type="file" name="medical_report" id="medical_report" accept="image/*" />
                    <label for="prescription" class="upload-icon">Choose Prescription</label>
                    <input type="file" name="prescription" id="prescription" accept="image/*" />
                    <label for="scan_report" class="upload-icon">Choose Scan Report</label>
                    <input type="file" name="scan_report" id="scan_report" accept="image/*" />
                    <button type="submit" class="submit" name="submit">Submit</button>
                    <span class="ok-message" id="ok-message"></span>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fileInputs = document.querySelectorAll('input[type="file"]');
            var okMessage = document.getElementById('ok-message');

            fileInputs.forEach(function (input) {
                input.addEventListener('change', function () {
                    var fileName = this.files[0].name;
                    okMessage.textContent = 'File "' + fileName + '" uploaded successfully!';
                    
                });
            });
        });
    </script>
</body>
</html>
