<?php

function open_connection() {
    $machine= "localhost";
    $username= "root";
    $password = "root";

    $database = "assignment_db";

    $conn = mysqli_connect($machine, $username, $password, $database);

    if (!$conn) {
        echo "Failed to open MySQL connection";
        exit();
    }

    return $conn;
}

function cleanInput($input){
    $input = trim($input);
    $input = stripslashes($input);
    return htmlspecialchars($input);
}

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = cleanInput($_POST['username']);
    $pass = cleanInput($_POST['password']);

    if (empty($username)) {
        header("Location: index.php?message=Username is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?message=Password is required");
        exit();
    } else {
        $conn = open_connection();
        $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $pass) {
                header("Location: index.php");
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                exit();
            } else {
                header("Location: index.php?message=Username or password is incorrect");
                exit();
            }
        } else {
            header("Location: index.php?message=Username or password is incorrect");
            exit();
        }
    }
}