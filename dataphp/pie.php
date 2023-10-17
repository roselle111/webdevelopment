<?php
include_once("../includes/dbutil.php");

// Function to get user gender count
function getUserGenderCount($conn) {
    $genderCountSql = "SELECT Gender, COUNT(*) AS Count FROM users GROUP BY Gender";
    $genderCountResult = mysqli_query($conn, $genderCountSql);

    $genderData = [];
    while ($row = mysqli_fetch_assoc($genderCountResult)) {
        $genderData[$row['Gender']] = $row['Count'];
    }

    return $genderData;
}

// Get database connection
$conn = getConnection();

// Get user gender count data
$genderData = getUserGenderCount($conn);

// Close database connection
closeConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Gender Pie Chart</title>
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
    </style>
</head>

<body>

<canvas id="genderChart"></canvas>

<script>
var genderData = <?php echo json_encode($genderData); ?>;
var genders = Object.keys(genderData);
var counts = Object.values(genderData);
var colors = ["#3498db", "#e74c3c"]; // Blue for male, Pink for female

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
                // You can perform an action based on the clicked slice, e.g., open a link or show details.
                console.log('Clicked on ' + genders[index] + ' slice');
            }
        },
        legend: { display: false },
        title: {
            display: true,
            text: "User Gender Distribution",
            fontSize: 18
        }
    }
});
</script>

</body>

</html>
