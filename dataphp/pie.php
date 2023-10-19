<?php
include_once("../includes/dbutil.php");

function getUserGenderCount($conn) {
    $genderCountSql = "SELECT Gender, COUNT(*) AS Count FROM users GROUP BY Gender";
    $genderCountResult = mysqli_query($conn, $genderCountSql);

    $genderData = [];
    while ($row = mysqli_fetch_assoc($genderCountResult)) {
        $genderData[$row['Gender']] = $row['Count'];
    }

    return $genderData;
}


$conn = getConnection();


$genderData = getUserGenderCount($conn);


closeConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #genderChart {
            width: 80%;
            max-width: 600px;
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
        
    </style>
</head>

<body>

<nav>
    <ul>
        <li><a href="admin_home.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<canvas id="genderChart"></canvas>

<script>
    var genderData = <?php echo json_encode($genderData); ?>;
    var genders = Object.keys(genderData);
    var counts = Object.values(genderData);
    var colors = ["#3498db", "#e74c3c"];

    var chart = new Chart("genderChart", {
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
            },
            title: {
                display: true,
                text: 'User Gender Distribution',
                fontColor: 'black',
                fontSize: 18
            }
        }
    });
</script>

</body>

</html>
