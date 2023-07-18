<?php
// Function to display the "history" view
function displayHistory()
{
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kidsGames";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch data from the "history" view
    $sql = "SELECT * FROM history";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table>";
        echo "<tr><th>Score Time</th><th>Player ID</th><th>First Name</th><th>Last Name</th><th>Result</th><th>Lives Used</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["scoreTime"] . "</td>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["fName"] . "</td>";
            echo "<td>" . $row["lName"] . "</td>";
            echo "<td>" . $row["result"] . "</td>";
            echo "<td>" . $row["livesUsed"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }

    // Close the connection
    $conn->close();
}

?>

<!-- Use the function to display the "history" view -->
<!DOCTYPE html>
<html>
<head>
    <title>History View</title>
</head>
<body>
    <h1>History View</h1>
    <?php
    // Call the displayHistory() function to show the view
    displayHistory();
    ?>
</body>
</html>