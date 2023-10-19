<?php
include_once('../includes/db_connection.php');
$conn = getConnection();

// Create an array to store the count of activities by month
$monthCounts = array_fill(1, 12, 0);

// Query the database to get the count of activities by month
$sql = "SELECT MONTH(date) AS month, COUNT(*) AS count FROM activities WHERE YEAR(date) = YEAR(NOW()) GROUP BY month";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
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
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80vh;
    margin: 0;
  }

  canvas {
    background-color: #fff;
    border: 1px solid #333;
  }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
  <div style="display: flex; align-items: center; justify-content: center; width: 100%;">
    <canvas id="myChart" style="width: 100%; max-width: 900px;"></canvas>
  </div>
  <script>
    var monthData = <?php echo json_encode(array_values($monthCounts)); ?>;
    var months = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    var colors = [
        '#786028', 'green', '#1984c5', 'orange', '#ab3da9', 'brown',
        'gray', 'pink', '#e14b31', '#ffb55a', '#3c4e4b', 'lime'
    ];

    var datasets = months.map(function(month, index) {
        return {
            label: month,
            data: [monthData[index]],
            backgroundColor: colors[index],
            borderColor: colors[index],
            borderWidth: 1
        };
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Activity Count'],
            datasets: datasets
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
                }
            }
        }
    });
  </script>
</body>
</html>
