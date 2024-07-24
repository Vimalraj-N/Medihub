<?php
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

        echo '<a href="form.php?table=' . $tableName . '"><button>Add Data</button></a>';
        echo '<a href="formreport.php?table=' . $tableName . '"><button>Add Report</button></a>';
    } else {
        echo "No data found.";
        echo '<a href="form.php?table=' . $tableName . '"><button>Add Report</button></a>';
        echo '<a href="formreport.php?table=' . $tableName . '"><button>Add Report</button></a>';
    }

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
        }

        $conn_ar->close();
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    /* body {
        display: flex;
        /* flex-direction:row; */
        align-items: center;
        justify-content: center;
    }  */

    .container {
        max-width: 800px;
        width: 100%;
        text-align: center;
    }

    .chart-container {
        margin-top: 20px;
        /* display: flex; */
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .card {
        width: 100%;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

  
    tr:hover {
        background-color: #f5f5f5;
    }

    button {
        padding: 10px 20px;
        /* display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center; */
        margin-top:  5px;
        margin-left:5px;
        background-color: #4CAF50;
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
    <div class="container">
    </div>

    <div class="container chart-container">
        <?php if ($resultGraph_ar->num_rows > 0): ?>
            <div class="card">
                <div class="card-body">
                    <canvas id="bloodSugarChart"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <canvas id="BPChart"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <canvas id="cholesterolChart"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <canvas id="WBCChart"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <canvas id="RBCChart"></canvas>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script>
        var chartData_ar = <?php echo json_encode($data_ar); ?>;

        function createBarChart(canvasId, label, data) {
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
                                text: 'Report Date'
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
            createBarChart('bloodSugarChart', 'Blood Sugar', chartData_ar.blood_sugar);
            createBarChart('BPChart', 'BP', chartData_ar.BP);
            createBarChart('cholesterolChart', 'Cholesterol', chartData_ar.cholesterol);
            createBarChart('WBCChart', 'WBC', chartData_ar.WBC);
            createBarChart('RBCChart', 'RBC', chartData_ar.RBC);
        <?php endif; ?>
        
    </script>
</body>

</html>
