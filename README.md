# Quickflash

Welcome to the Quickflash repository! Quickflash is a dynamic flashcard website designed to help users learn and memorize information more effectively. With a simple and intuitive user interface, Quickflash allows users to create, manage, and use flashcards for various subjects and topics.

## Features

- **User Registration and Login**: Secure user authentication to keep your flashcards private.
- **Flashcard Management**: Create, view, and delete flashcards.
- **Interactive Learning Sessions**: Engage with flashcards in a user-friendly interface.

## Website Access

To access Quickflash, visit [Quickflash Website](quickflash.store).

## How to Use Quickflash

1. **Sign Up**: Register for an account by providing your name, email, and password. Navigate to the signup page directly at `http://your-website-url.com/signup`.

2. **Log In**: After registering, log in with your credentials to access your personalized flashcard dashboard.

3. **Create Flashcards**: Once logged in, you can start creating flashcards by entering a term and its definition.

4. **Study**: Use the interactive learning session to review your flashcards and test your memory.

5. **Manage Flashcards**: View your list of flashcards and delete any that you no longer need.

## Technical Setup

The project is structured with several key PHP files that handle different aspects of the application:
- `database.php` - Manages the database connection.
- `login.php` - Handles user login.
- `logout.php` - Manages user logout.
- `insert.php` - For inserting new flashcards into the database.
- `delete.php` - Handles the deletion of flashcards.
- `generate.php` - Used to generate the flashcard view.
- `home.php` - The main dashboard for logged-in users.
- `process-signup.php` - Processes user registrations.
- `validate-email.php` - Validates emails during registration.

### Prerequisites

- PHP 7.4 or higher.
- MySQL Database.
- Functioning Laptop or Computer
- Stable Wi-Fi connection

### Installation

1. Clone the repository to your server.
2. Configure your web server to point to the cloned directory.
3. Set up the MySQL database and import any necessary schema from the provided SQL files (not included in this description).
4. Update `database.php` with your database credentials.

## Contributing

Feel free to fork this repository and submit pull requests. You can also open issues if you find bugs or have feature suggestions.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Authors

- Martin Nguyen, Michael Aladerasu, Edward Hernandez, Joseph Velasquez, Rilijin Carrillo

Enjoy using Quickflash for your learning needs!
