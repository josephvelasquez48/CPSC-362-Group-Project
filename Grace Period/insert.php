<?php
session_start();
include 'database.php';

$json_data = file_get_contents('php://input');
echo "Received JSON data: " . $json_data . "<br>";
file_put_contents('received_json.log', $json_data . PHP_EOL, FILE_APPEND);
$data = json_decode($json_data, true);

if($data === null){
    echo "Invalid JSON data!";
    exit();
}
if(!isset($_SESSION["user_id"])){
    http_response_code(401);
    exit("User is not logged in!");
}

$user_id = $_SESSION["user_id"];

$sql = "INSERT INTO flashcards (id, word, definition, user_id) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("issi", $id, $word, $definition, $user_id);


foreach ($data as $flashcard){
    $word = $flashcard['word'];
    $definition = $flashcard['definition'];
    // Remove this line: $user_id = $user_id['user_id'];
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
