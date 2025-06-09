<?php
require "includes/db_connector.php";

$username = "kentoy";
$hashedPassword = password_hash("12345", PASSWORD_DEFAULT);
try {

    $insertData = ["user_id" => "admin001", "username" => $username, "password" => $hashedPassword, "first_name" => "Kent Francis", "middle_name" => "Estante", "last_name" => "Genilo", "user_role" => "admin", "admin_designation" => "Site Developer"];

    $stmt = $conn->prepare("INSERT INTO user (user_id, username, password, first_name, middle_name, last_name, user_role, admin_designation) VALUES (:user_id, :username, :password, :first_name, :middle_name, :last_name, :user_role, :admin_designation)");
    $stmt->execute($insertData);

} catch (Exception $e) {
    echo "". $e->getMessage() ."";
}


?>