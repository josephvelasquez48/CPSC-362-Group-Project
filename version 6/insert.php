<?php
include 'database.php';

$json_data = file_get_contents('php://input');

$data = json_decode($json_data, true);

if($data === null){
    echo "Invalid JSON data!";
    exit();
}

$sql = "INSERT INTO flashcards (question, answer) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $question, $answer);

foreach ($data as $flashcard){
    $question = $flashcard['Word'];
    $answer = $flashcard['definition'];
    $stmt->execute();
}

if($stmt->errno){
    echo "Error: " . $stmt->error;
}else{
    echo "Flashcards inserted successfully!";
}

$stmt->close();
$mysqli->close();
?>