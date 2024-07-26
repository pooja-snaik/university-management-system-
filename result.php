<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $answers = array(
        "q1" => "Paris",  // Correct answers
        // Add correct answers for other questions
    );

    $userAnswers = $_POST;

    // Compare user answers with correct answers
    $score = 0;
    foreach ($userAnswers as $question => $answer) {
        if ($answers[$question] === $answer) {
            $score++;
        }
    }

    // Store results in the database
    $host = "your_database_host";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "quiz_results";

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $insertQuery = "INSERT INTO results (user_score) VALUES ($score)";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Quiz completed! Your score: $score";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
