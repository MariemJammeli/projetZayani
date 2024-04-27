<?php
$email = $_POST['email'];
$pass = $_POST['pass'];

// Establishing database connection
$conn = mysqli_connect("localhost", "root", "", "zayani");

if (!$conn) {
    // Handle connection error gracefully
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize user input (optional but recommended)
$email = mysqli_real_escape_string($conn, $email);
$pass = mysqli_real_escape_string($conn, $pass);

// Query to retrieve user
$req = "select  * from user WHERE email='$email'";
$result = mysqli_query($conn, $req);
if ($result && mysqli_num_rows($result) > 0) {
    // User found, verify password
    $user = mysqli_fetch_assoc($result);
        print($user['passwor']);
        if ($pass == $user['passwor']) {
            // Redirect if authentication successful
            header("Location: Acceuil.html");
            exit();
        } else {
            // Password incorrect
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }

// Close database connection
mysqli_close($conn);
?>
