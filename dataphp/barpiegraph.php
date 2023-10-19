<?php
include_once("../includes/dbutil.php");
$conn = getConnection();

// Get user gender data
$genderData = [];
$genderCountSql = "SELECT Gender, COUNT(*) AS Count FROM users GROUP BY Gender";
$genderCountResult = mysqli_query($conn, $genderCountSql);

while ($row = mysqli_fetch_assoc($genderCountResult)) {
    $genderData[$row['Gender']] = $row['Count'];
}

// Create an array to store the count of activities by month
$monthCounts = array_fill(1, 12, 0);

// Query the database to get the count of activities by month
$activitySql = "SELECT MONTH(date) AS month, COUNT(*) AS count FROM activities WHERE YEAR(date) = YEAR(NOW()) GROUP BY month";
$activityResult = mysqli_query($conn, $activitySql);

while ($row = mysqli_fetch_assoc($activityResult)) {
    $month = $row['month'];
    $count = $row['count'];

    // Update the count in the array
    $monthCounts[$month] = $count;
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            color: #333;
        }

        #chart-container {
            display: flex;
            justify-content: space-between;
            width: 1500%;
            max-width: 1300px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
        }

        #chart-container > div {
            flex: 1;
            padding: 20px;
        }

        #pie-chart {
            border-right: 4px solid #ccc; 
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        canvas {
            width: 100%;
        }

        nav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #333;
            overflow-x: hidden;
            padding-top: 20px;
            transition: 0.5s;
        }

        nav ul {
            display: flex;
            flex-direction: column;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        nav li {
            float: left;
        }

        nav a {
            display: block;
            color: white;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }
        #container {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 20px;
    }

    #pie-chart,
    #bar-chart {
        flex: 1;
        padding: 20px;
        text-align: center;
        border: 1px solid #ccc;
    }

    #pie-chart {
        border-right: none;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    canvas {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
    </style>
</head>
<body>
    <div id="chart-container">
        <div id="pie-chart">
            <h1>User Gender Distribution</h1>
            <canvas id="genderChart"></canvas>
        </div>
        <div id="bar-chart">
            <h1>Monthly Activity Bar Chart</h1>
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <body>

    <nav>
        <ul>
            <li><a href="admin_home.php">Home</a></li>
        </ul>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var genderData = <?php echo json_encode($genderData); ?>;
        var genders = Object.keys(genderData);
        var counts = Object.values(genderData);
        var colors = ["#3498db", "#e74c3c"];

        var pieChart = new Chart("genderChart", {
            type: "pie",
            data: {
                labels: genders,
                datasets: [{
                    backgroundColor: colors,
                    data: counts
                }]
            },
            options: {
                onClick: function (event, elements) {
                    if (elements.length > 0) {
                        var index = elements[0]._index;
                        console.log('Clicked on ' + genders[index] + ' slice');
                    }
                },
                plugins: {
                    datalabels: {
                        display: true,
                        color: 'white',
                        font: {
                            size: 18
                        }
                    },
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });

        /* BARGRAPH*/
        var monthData = <?php echo json_encode(array_values($monthCounts)); ?>;
        var months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        var colors = [
            '#786028', 'green', '#1984c5', '#cdca56', '#ab3da9', 'brown',
            'gray', 'pink', '#e14b31', '#ffb55a', '#3c4e4b', 'lime'
        ];

        var barChart = new Chart("myChart", {
            type: 'bar',
            data: {
                labels: ['Activity Count'],
                datasets: months.map(function(month, index) {
                    return {
                        label: month,
                        data: [monthData[index]],
                        backgroundColor: colors[index],
                        borderColor: colors[index],
                        borderWidth: 1
                    };
                })
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Activity Bar Chart',
                        padding: 20,
                        font: {
                            size: 18,
                            weight: 'bold'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
