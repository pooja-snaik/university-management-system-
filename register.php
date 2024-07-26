<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>
<body>
    <h1>Registration Result</h1>
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $course = $_POST["course"];

        // SQL query to insert data
        $sql = "INSERT INTO student (name, email, course) VALUES ('$name', '$email', '$course')";

        if ($conn->query($sql) === TRUE) {
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Course: $course<br>";
            echo "Registration successful!";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
