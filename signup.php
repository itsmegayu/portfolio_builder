<?php
session_start();
include 'config.php'; // Ensure this file contains the necessary database connection code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL query to insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    if ($stmt->execute()) {
        // Redirect to login page after successful signup
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!-- Signup form HTML here -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="signup.css"> <!-- Link to the CSS file -->
</head>
<body>
    <div class="container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form action="login.php" method="POST">
                <div class="user-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="signup-button">Sign Up</button>
                <p class="login-link">Already have an account? <a href="login.html">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #1c1c1c;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.signup-box {
    background: #282828;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    text-align: center;
    color: #fff;
}

.signup-box h2 {
    margin-bottom: 30px;
    font-size: 24px;
    color: #fff;
}

.user-box {
    position: relative;
    margin-bottom: 30px;
}

.user-box input {
    width: 100%;
    padding: 10px 0;
    background: transparent;
    border: none;
    border-bottom: 2px solid #fff;
    outline: none;
    color: #fff;
    font-size: 16px;
}

.user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #fff;
}

.user-box input:focus ~ label,
.user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #ff6347;
    font-size: 12px;
}

.signup-button {
    background-color: #ff6347;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

.signup-button:hover {
    background-color: #e5533d;
}

.login-link {
    margin-top: 20px;
    color: #fff;
}

.login-link a {
    color: #ff6347;
    text-decoration: none;
}
/* Same CSS for body */
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #1c1c1c;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.signup-box {
    background: #282828;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    text-align: center;
    color: #fff;
}

.signup-box h2 {
    margin-bottom: 30px;
    font-size: 24px;
    color: #fff;
}

.user-box {
    position: relative;
    margin-bottom: 30px;
}

.user-box input {
    width: 100%;
    padding: 10px 0;
    background: transparent;
    border: none;
    border-bottom: 2px solid #fff;
    outline: none;
    color: #fff;
    font-size: 16px;
}

.user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #fff;
}

.user-box input:focus ~ label,
.user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #ff6347;
    font-size: 12px;
}

.signup-button {
    background-color: #ff6347;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

.signup-button:hover {
    background-color: #e5533d;
}

.login-link {
    margin-top: 20px;
    color: #fff;
}

.login-link a {
    color: #ff6347;
    text-decoration: none;
}
</style>