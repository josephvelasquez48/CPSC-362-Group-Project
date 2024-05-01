<?php
session_start(); // Start the session to access session variables

include 'database.php'; // Include database connection details

// Check if required data is sent
if (empty($_POST["user_id"]) || empty($_POST["flashcards"])) {
  echo "Error: Missing required data.";
  exit();
}

$target_user_id = $_POST["user_id"]; // ID of the user receiving the flashcards
$flashcards = json_decode($_POST["flashcards"], true); // Decode the JSON string containing flashcards

// Open database connection
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_database);

// Check connection
if ($mysqli->connect_errno) {
  echo "Error: Could not connect to database.";
  exit();
}

// Prepare insert statement (assuming table has columns: word, definition)
$sql = "INSERT INTO flashcards (user_id, word, definition) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Loop through each flashcard and insert into database
foreach ($flashcards as $flashcard) {
  $word = $flashcard["word"];
  $definition = $flashcard["definition"];

  // Bind parameters for each flashcard
  $stmt->bind_param("iss", $target_user_id, $word, $definition);

  // Execute insert statement
  $stmt->execute();

  // Check for errors during insertion
  if ($stmt->errno) {
    echo "Error: Could not insert flashcard: " . $stmt->error;
    $stmt->close(); // Close statement on error
    $mysqli->close(); // Close connection on error
    exit();
  }
}

$stmt->close(); // Close statement after successful insertions
$mysqli->close(); // Close database connection

echo "Flashcards copied successfully!";

?>