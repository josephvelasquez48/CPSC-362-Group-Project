# CPSC-362 Group Project
 Source code for group project


QuickFlash
Overview

QuickFlash is a web-based application designed for creating and managing digital flashcards. It allows users to register, log in, and create personalized flashcards for studying and memorization.
Features

    User Registration and Login: Secure signup and login functionality.
    Flashcard Management: Users can create, save, and view flashcards.
    Automatic Redirection: After successful signup, users are automatically redirected to the login page.

Technologies Used

    HTML/CSS: For structuring and styling the web pages.
    JavaScript: For client-side scripting and form validations.
    PHP: Backend scripts to handle user authentication, registration, and session management.
    MySQL: (Assumed based on context) For storing user data and flashcards.

Project Structure

    index.html - The main entry point of the application with navigation and flashcard creation features.
    signup.html and signup-success.html - Handles the user registration process.
    login.php - Manages user login functionality.
    logout.php - Handles user logout.
    process-signup.php - Processes the signup form data.
    database.php - Manages database connections (assumed based on the context, not visible in the provided files).
    java.js - Contains JavaScript for client-side logic.

Setup and Installation

    Clone the repository:

    bash

git clone 

Navigate to the project directory:

bash

    cd QuickFlash

    Setup the database:
        Import the SQL script provided in the database.sql file to set up the database schema.
    Configure your server:
        Ensure your server supports PHP and MySQL.
        Configure the database.php to connect to your database.

Usage

    Open the index.html in your browser to start using the application.
    Register a new account using the signup form.
    Log in to access and create flashcards.

Contributing

Contributions are welcome! For major changes, please open an issue first to discuss what you would like to change.
License

Distributed under the MIT License. See LICENSE for more information.
