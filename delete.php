<?php
session_start(); // Start the session to access session variables
include 'database.php';
$user_id = $_SESSION["user_id"];

// SQL query to delete flashcards for a specific user ID
$sql = "DELETE FROM flashcards WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id); // Bind the user_id parameter

$stmt->execute();

if($stmt->errno){
    echo "Error: " . $stmt->error;
}else{
    echo "Flashcards deleted successfully!";
}

$stmt->close();
$mysqli->close();
?>
