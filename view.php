<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض أخر قيمة تم تخزينها في قاعدة البيانات</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-color: pink;">
	<a style="background-color: orange; color: blue; font-weight: bold;" href="home.php" class="view-link">Back to Home</a>
    <div class="container">
        <h2 style="color: blue; color: blue; font-weight: bold;">عرض أخر قيمة تم تخزينها في قاعدة البيانات</h2>
        <div class="last-action" style="background-color: orange; width: 50px; height: 20px; text-align: center;">
            <?php
           
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "my-robot-app-db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT action FROM robot_actions ORDER BY reg_date DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output the first letter of the last action
                while($row = $result->fetch_assoc()) {
                    echo "<span class='action'>" . strtoupper($row["action"][0]) . "</span>";
                }
            } else {
                echo "No actions found";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
