<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Questions</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .question-container { max-width: 600px; margin: auto; text-align: left; }
    </style>
</head>
<body>
    <h2>Submitted Questions</h2>
    <div class="question-container">
        <?php
        $servername = "localhost";
        $username = "root"; // Change if needed
        $password = ""; // Change if needed
        $dbname = "questions_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT username, question, created_at FROM questions ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>" . htmlspecialchars($row["username"]) . ":</strong> " . htmlspecialchars($row["question"]) . "<br><small>" . $row["created_at"] . "</small></p>";
            }
        } else {
            echo "<p>No questions yet!</p>";
        }

        $conn->close();
        ?>
    </div>
    <p><a href="index.html">Go Back</a></p>
</body>
</html>
