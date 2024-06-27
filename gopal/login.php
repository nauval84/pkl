<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize input (add more robust validation)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Query the database to check credentials
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password (replace with your password hashing mechanism)
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: apply.php");
            exit();
        }
    }

    echo "Invalid email or password.";
}
?>