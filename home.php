<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quickflash</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <title>Quickflash Registration</title>
        <link rel="stylesheet"
              href="css/style.css">
              <style>
        body {
            background-image: url('assets/img/bg-masthead.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh; /* Ensure full viewport height */
        }
    </style>
    <style>
    .normal-button {
        width: auto;
        height: auto;
        padding: 10px 20px; /* Adjust padding as needed */
        font-size: 16px; /* Adjust font size as needed */
        /* Add any other styles you want */
    }
    </style>
    <style>
   .word {
            padding: 5px 10px; /* Adjust padding as needed */
            background-color: white; /* Set the background color to white */
            /* Add any other styles you want */}
            
            

</style>

<style>
#container {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
}
</style>
<style>
    .flashcard-grid {
  display: flex;
  flex-wrap: wrap;
}



</style>


    </head>
    <body id="page-top">

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Quickflash</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    
                        <!--<li class="nav-item"><a class="nav-link" href="logintrue.html">Login/Register</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="login.php">Log Out</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html">Register</a></li>
                        <li class="nav-item">
  <?php
    session_start();
    if(isset($_SESSION["user_id"])) {
      echo '<a class="nav-link"><div>User ID: ' . $_SESSION["user_id"] . '</div></a>';
    } else {
      echo '<a class="nav-link"><div>User ID: Not logged in</div></a>';
    }
  ?>
</li>
                    </ul>
                </div>
            </div>
        </nav>
<body>







   

    <script>
        // Array to store flashcards
        let flashcards = [];

        // Function to add flashcard
        function addFlashcard() {
            let wordInput = document.getElementById("wordInput").value.trim();
            let definitionInput = document.getElementById("definitionInput").value.trim();

            if (wordInput === "" || definitionInput === "") {
                alert("Please enter both word and definition.");
                return;
            }

            let flashcard = {
                word: wordInput,
                definition: definitionInput
            };

            flashcards.push(flashcard);

            renderFlashcard(flashcard);

            // Clear input fields
            document.getElementById("wordInput").value = "";
            document.getElementById("definitionInput").value = "";
            document.getElementById("addFlashcardBtn").disabled = true
        }

        function renderFlashcards(flashcards) {
        let flashcardContainer = document.getElementById("flashcardContainer");
        flashcardContainer.innerHTML = ""; // Clear existing flashcards

        // Loop through each flashcard and create a div element for it
        flashcards.forEach(function(flashcard) {
  // Create the main flashcard element
  let flashcardDiv = document.createElement("div");
  flashcardDiv.classList.add("flashcard");
  flashcardDiv.style.backgroundColor = "white";

  // Create the front side of the card
  let flashcardFront = document.createElement("div");
  flashcardFront.classList.add("flashcard-face", "front");
  flashcardFront.textContent = flashcard.word;

  // Create the back side of the card
  let flashcardBack = document.createElement("div");
  flashcardBack.classList.add("flashcard-face", "back");
  flashcardBack.textContent = flashcard.definition;

  // Append front and back sides to the main card
  flashcardDiv.appendChild(flashcardFront);
  flashcardDiv.appendChild(flashcardBack);
    flashcardDiv.addEventListener("click", function() {
      flashcardDiv.classList.toggle("flipped");
      
    
    });
   
  // Append the complete card to the container
  flashcardContainer.appendChild(flashcardDiv);

  
});
        }
        
 
        // Function to save flashcards to database
        function saveFlashcards() {
            if (flashcards.length === 0) {
                alert("No flashcards to save.");
                return;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "insert.php");
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                    // Clear flashcards array and container
                    flashcards = [];
                    document.getElementById("flashcardContainer").innerHTML = "";
                } else {
                    alert("Error: " + xhr.statusText);
                }
            };

            xhr.onerror = function() {
                alert("Network Error");
            };

            xhr.send(JSON.stringify(flashcards));
        }
        function generateFlashcards() {
            // Send an AJAX request to generate flashcards
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "generate.php");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var flashcards = JSON.parse(xhr.responseText);
                        renderFlashcards(flashcards);
                        // Process the generated flashcards (e.g., display them on the page)
                        console.log(flashcards); // Example: Log the flashcards to the console
                    } else {
                        console.error("Error: " + xhr.status);
                    }
                }
            };
            xhr.send();
        }
        
        // Function to delete all flashcards
    function deleteFlashcards() {
    // Send an AJAX request to delete flashcards
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "delete.php");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Log the response
                // Optionally, update the UI or display a message indicating successful deletion
            } else {
                console.error("Error: " + xhr.status);
            }
        }
    };
    xhr.send();
}
 
 
function copyFlashcards(fromUserId, toUserId) {
  // Check for invalid input
  if (fromUserId === toUserId) {
    alert("Error: Cannot copy flashcards to the same user.");
    return;
  }

  // Send AJAX request to get flashcards from source user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_flashcards.php?user_id=" + fromUserId);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var flashcards = JSON.parse(xhr.responseText);

        // Send AJAX request to copy flashcards to target user
        var copyXhr = new XMLHttpRequest();
        copyXhr.open("POST", "copy_flashcards.php");
        copyXhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        copyXhr.onload = function() {
          if (copyXhr.status === 200) {
            alert(copyXhr.responseText); // Display success message (optional)
          } else {
            alert("Error: " + copyXhr.statusText);
          }
        };
        copyXhr.onerror = function() {
          alert("Network Error");
        };
        copyXhr.send(JSON.stringify({ user_id: toUserId, flashcards: flashcards }));
      } else {
        console.error("Error: Could not get flashcards from user " + fromUserId);
      }
    }
  };
  xhr.send();
}
    </script>


<div class="container px-4 px-lg-5 h-100">
    <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
    <h1>Create Flashcards</h1>
    <header class="masthead">
      <div class="container"> <div class="box">
        <h6>Enter User Id For Cloning</h6>  
        <input type="text" id="User_ID" placeholder="User ID">
        <button class="normal-button" onclick="copyFlashcards()">Clone</button>
    
      </div>
    
    <div class="container">  <div class="box">
        <h2>Create Your Flashcards Here</h2>
        <br>
        <label for="Word">Word</label>
        <input type="text" id="wordInput" placeholder="Enter Word">
        <br>
        <label for="definition">Definition</label>
        <input type="text" id="definitionInput" placeholder="Enter Definition">
        <button onclick="addFlashcard()">Add</button>
        <button onclick="saveFlashcards()">Save</button>
        <button onclick="deleteFlashcards()">Delete/Edit</button>
        <button onclick="generateFlashcards()">Generate Flashcards</button>
     
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 align-self-baseline">
    <div class="flashcard-grid" id="flashcardContainer">
      <!-- Content for the flashcards will be added here -->
    </div>
  </div>
</div>
    
</body>
<br>
<br>
<br>
<br>



    
</div>
</header>
</html> 