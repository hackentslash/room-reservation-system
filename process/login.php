<?php
session_start();
require '../includes/db_connector.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (empty($username) || empty($password)) {
    $_SESSION['login_error'] = "Please fill in both fields.";
    header("Location: ../index.php");
    exit();
}

try {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_role'] = $user['user_role'];

        header("Location: ../".$user['user_role']."/".$user['user_role']."_dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid username or password.";
        header("Location: ../index.php");
        exit();
    }

} catch (PDOException $e) {
    die("Query error: " . $e->getMessage());
}


?>