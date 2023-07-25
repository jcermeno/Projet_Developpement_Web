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
    <style>
        .blueText {
    color: blue;
}

.redText {
    color: red;
}

#back {
    width: inherit;
    margin-right: auto;
    margin-left: auto;
}

.container {
    width: 50%;
    border-radius: 6px;
    margin: 5px auto 5px auto;
    border: 2px solid black;
    padding: 2% 2% 2% 2%;
    text-align: center;
}

table {
    margin: 1px auto 1px auto;
}

tr.submit:nth-of-type(4)>td:nth-child(1),
tr.submit:nth-of-type(4)>td:nth-child(2){
    border: none !important;
}

th,
td,
tr.result>td{
    border: 1px solid #000000 !important;
    text-align: left;
}

form,
table {
    margin-right: auto;
    margin-left: auto;
}

#submit1 {
    margin-left: 28%;
}

h1 {
    font-size: 100%;
    text-align: center;
}
</style>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <h1>History View</h1>
    <?php
    // Call the displayHistory() function to show the view
    displayHistory();
    ?>
    <?php include 'footer.php'; ?>
</body>
</html>