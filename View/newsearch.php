<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';
$sql = "SELECT * FROM mytable WHERE mycolumn LIKE '%$query%'";
$result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='result-item'>";
                    echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
                    echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results found.";
            }
            $conn->close();
            ?>
