<!DOCTYPE html>
<html>
<head>
    <title>Weather Data</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f6ff; /* Light blue background */
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff; /* Dark blue title */
        }

        .weather-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .weather-table th, .weather-table td {
            border: 1px solid #007bff; /* Dark blue border */
            padding: 10px;
            text-align: center;
        }

        .weather-table th {
            background-color: #b3c6ff; /* Light blue background */
            color: #007bff; /* Dark blue text */
        }

        .weather-table td {
            background-color: #d9e6ff; /* Light blue background */
            color: #000; /* Black text */
        }
        .weather-table td.date {
            width: 200px; /* Adjust the width as needed */
        }

        .icon {
            font-size: 18px;
            color: #007bff; /* Dark blue icon color */
        }

        .no-data {
            text-align: center;
            font-size: 18px;
            color: #666;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container">
        <h1>Latest 10 Weather Records <i class="icon fas fa-sun"></i></h1>
        
        <?php
        $servername = "localhost";
        $username = "id21495853_hachim";
        $password = "Venti_333";
        $database = "id21495853_db";


        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM WeatherData ORDER BY date DESC, time DESC LIMIT 10";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="weather-table">';
            echo '<tr>';
            echo '<th>Date</th>';
            echo '<th>Time</th>';
            echo '<th><i class="icon fas fa-tint"></i> Humidity</th>';
            echo '<th><i class="icon fas fa-chart-line"></i> Pressure</th>';
            echo '<th><i class="icon fas fa-wind"></i> Wind Speed</th>';
            echo '<th><i class="icon fas fa-compass"></i> Wind Direction</th>';
            echo '<th><i class="icon fas fa-cloud-showers-heavy"></i> Rainfall Rate</th>';
            echo '</tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["date"] . '</td>';
                echo '<td>' . $row["time"] . '</td>';
                echo '<td>' . $row["humidity"] . '</td>';
                echo '<td>' . $row["pressure"] . '</td>';
                echo '<td>' . $row["wind_speed"] . '</td>';
                echo '<td>' . $row["wind_direction"] . '</td>';
                echo '<td>' . $row["rainfall_rate"] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "<div class='no-data'>No data available</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>