<?php

error_reporting(0);

 require_once "D:/xampp/htdocs/Live/Loginpage/Form/twilio-php-main/src/Twilio/autoload.php";
 use Twilio\Rest\Client;


//  function sendSMSAlert($message, $to) {
    
//      $twilioAccountSid = 'AC0ab79f9e4fe6c8eb6a0cdd1d8d1e116e';
//      $twilioAuthToken = '26b3306db151fb7a6f303021cb1b79f7';
//      $twilioPhoneNumber = '+16097552204';
    
    
//      $client = new Client($twilioAccountSid, $twilioAuthToken);

    
//      $client->messages->create(
//          $to,
//          [
//              'from' => $twilioPhoneNumber,
//              'body' => $message
//          ]
//      );
//  }

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $tableName = $_GET["table"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Live";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqlFetchData = "SELECT * FROM `$tableName`";
    $result = $conn->query($sqlFetchData);

    if ($result->num_rows > 0) {
        echo "<table border='1' style='border-collapse:collapse;' cellpadding='10' cellspacing='5'>";
        echo "<tr><th>ID</th><th>Hospital</th><th>Doctor</th><th colspan='2'>Medical Report</th><th colspan='2'>Prescription</th><th colspan='2'>Scan Report</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['hospital'] . "</td>";
            echo "<td>" . $row['doctor'] . "</td>";

            echo "<td><a href='download.php?id=" . $row['id'] . "&column=medical_report&table=" . $tableName . "'>View</a></td>";
            echo "<td><a href='downloadimg.php?id=" . $row['id'] . "&column=medical_report&table=" . $tableName . "'>Download</a></td>";

            echo "<td><a href='download.php?id=" . $row['id'] . "&column=prescription&table=" . $tableName . "'>View</a></td>";
            echo "<td><a href='downloadimg.php?id=" . $row['id'] . "&column=prescription&table=" . $tableName . "'>Download</a></td>";

            echo "<td><a href='download.php?id=" . $row['id'] . "&column=scan_report&table=" . $tableName . "'>View</a></td>";
            echo "<td><a href='downloadimg.php?id=" . $row['id'] . "&column=scan_report&table=" . $tableName . "'>Download</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo '<div class="bt">';
        echo '<a href="form.php?table=' . $tableName . '"><button>Add Data</button></a>';
        echo '<a href="formreport.php?table=' . $tableName . '"><button>Add Report</button></a>';
        echo '<a href="./events.php"><button>Add Events</button></a>';
        echo '<a href="./success.php"><button>Visit Events</button></a>';
        echo '<a href="./u_event.php"><button>Update & Delete Events</button></a>';
        echo '<a href="http://127.0.0.1:3000"><button>Skin Check</button></a>';
         echo '</div>';
    } else {
        echo '<img src="emoji.png" width="250px" height="250px" style="margin-left:730px;"/><br>';
        echo '<h4 style="margin-left:770px;">No data found.</h4>';
        echo '<div class="bt">';
        echo '<a href="form.php?table=' . $tableName . '"><button>Add Report</button></a>';
        echo '<a href="formreport.php?table=' . $tableName . '"><button>Add Report</button></a>';
        echo '<a href="./events.php"><button>Add Events</button></a>';
        echo '<a href="./success.php"><button>Visit Events</button></a>';
        echo '<a href="./u_event.php"><button>Update & Delete Events</button></a>';
        echo '<a href="http://127.0.0.1:3000"><button>Skin Check</button></a>';
        echo '</div>';
    }

    $conn->close();

    
    $servername_ar = "localhost";
    $username_ar = "root";
    $password_ar = "";
    $dbname_ar = "report";

    $conn_ar = new mysqli($servername_ar, $username_ar, $password_ar, $dbname_ar);
    if ($conn_ar->connect_error) {
        die("Connection failed: " . $conn_ar->connect_error);
    }

    $sqlFetchGraphData_ar = "SELECT report_date, blood_sugar, BP, cholesterol, WBC, RBC FROM `$tableName`";
    $resultGraph_ar = $conn_ar->query($sqlFetchGraphData_ar);

    if ($resultGraph_ar->num_rows > 0) {
        $data_ar = array();
        $labels_ar = array();

        while ($row_ar = $resultGraph_ar->fetch_assoc()) {
            $labels_ar[] = $row_ar['report_date'];
            $data_ar['blood_sugar'][] = $row_ar['blood_sugar'];
            $data_ar['BP'][] = $row_ar['BP'];
            $data_ar['cholesterol'][] = $row_ar['cholesterol'];
            $data_ar['WBC'][] = $row_ar['WBC'];
            $data_ar['RBC'][] = $row_ar['RBC'];
              $message = '';
            //  if ($row_ar['BP'] > 140) {
            //      $message .= "Alert: High BP detected . COUNT : " . $row_ar['BP'] . ". ";
            //  }
            //  if ($row_ar['cholesterol'] > 200) {
            //      $message .= "Alert: High cholesterol detected. COUNT : " . $row_ar['cholesterol']  . ". ";
            //  }
            //  if ($row_ar['RBC'] > 5.5) {
            //      $message .= "Alert: High RBC count detected. COUNT : " . $row_ar['RBC']. ". ";
            //  }
            //  if ($row_ar['WBC'] > 10000) {
            //      $message .= "Alert: High WBC count detected. COUNT : " .$row_ar['WBC'] . ". ";
            //  }
            //  if ($row_ar['blood_sugar'] > 150) {
            //      $message .= "Alert: High blood sugar detected. COUNT : " . $row_ar['blood_sugar'] . ". ";
            //  }
            
            //  if (!empty($message)) {
            //      $to = '+919342553675'; 
            //      sendSMSAlert($message, $to);
            //  }
        }

        
        echo "<div class='container chart-container'>";
        echo "<div class='card'><div class='card-body'><canvas id='bloodSugarChart'></canvas></div></div>";
        echo "<div class='card'><div class='card-body'><canvas id='BPChart'></canvas></div></div>";
        echo "<div class='card'><div class='card-body'><canvas id='cholesterolChart'></canvas></div></div>";
        echo "<div class='card'><div class='card-body'><canvas id='WBCChart'></canvas></div></div>";
        echo "<div class='card'><div class='card-body'><canvas id='RBCChart'></canvas></div></div>";
        echo "</div>";

        
        $conn_ar->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('Designer.png'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(4px) brightness(80%);
            font-family: "Poppins", sans-serif;
            font-weight: 800;
            font-style: normal;
            align-items: center;
            justify-content: center;
            
            
        }

        .container {
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        .chart-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 5000px;
            font-family: "Poppins", sans-serif;
            font-weight: 800;
            font-size:5px;
            font-style:bold;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background: rgba(255, 255, 255,0.7);
            backdrop-filter: blur(10px);
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 15px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            font-size:14px;
        }

        th,
        td {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 8px;
            font-size:14px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-size:14px;
        }

      
        tr:hover {
            background-color:rgba(0, 0, 0,0.2);
        }
        .bt
        {
             display: flex;
            justify-content: center;
        }

        button {
            padding: 10px 20px;
            margin-top: 20px;
            margin-left: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        
    </style>
</head>

<body>
    <script>
        var chartData_ar = <?php echo json_encode($data_ar); ?>;

        function createLineChart(canvasId, label, data) {
            var ctx = document.getElementById(canvasId).getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($labels_ar); ?>,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'category',
                            labels: <?php echo json_encode($labels_ar); ?>,
                            title: {
                                display: true,
                                text: 'Report Date',
                                
                            }
                            
                        },
                        y: {
                            beginAtZero: true
                            
                        }
                    }
                }
            });
           
        }

        <?php if ($resultGraph_ar->num_rows > 0): ?>
            createLineChart('bloodSugarChart', 'Blood Sugar', chartData_ar.blood_sugar);
            createLineChart('BPChart', 'BP', chartData_ar.BP);
            createLineChart('cholesterolChart', 'Cholesterol', chartData_ar.cholesterol);
            createLineChart('WBCChart', 'WBC', chartData_ar.WBC);
            createLineChart('RBCChart', 'RBC', chartData_ar.RBC);
        <?php endif; ?>
    </script>
</body>

</html>
