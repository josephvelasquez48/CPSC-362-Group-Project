<?php
session_start();
include 'database.php';

if(!isset($_SESSION["user_id"])){
    http_response_code(401);
    exit("User is not logged in!");
}

$user_id = $_SESSION["user_id"];

// Fetch flashcards for the current user from the database
$sql = "SELECT * FROM flashcards WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$flashcards = $result->fetch_all(MYSQLI_ASSOC);

// Output the flashcards as JSON
header('Content-Type: application/json');
echo json_encode($flashcards);
?>
