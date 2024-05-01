<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];
            
            header("Location: home.php");
            exit;
        }
    }

    $is_invalid = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>QuickFlash-Login</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <!-- SimpleLightbox plugin CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    <!-- Custom Styles -->
    <link rel="stylesheet"
              href="css/style.css">

    <style>
        body {
            background-image: url("../assets/img/flashcard.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <h1>QuickFlash</h1>
    <?php if ($is_invalid): ?>
        <em>Invalid Login!</em>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit">Log in</button>
        <p>Not registered? <a href="index.html" style="text-decoration: none;">Create an account</a></p>
    </form>

    <!-- Script -->
    <script src="java.js"></script>

</body>

</html>
