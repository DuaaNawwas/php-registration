<?php
include 'connect.php';

try {
    $userid = $_POST['userid'];

    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $tname = $_POST["tname"];
    $lname = $_POST["lname"];
    $fullname = $fname . " " . $sname . " " . $tname . " " . $lname;
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $hashedpwd = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', dob='$dob', user_pwd='$hashedpwd',  role='$role' WHERE userid=$userid";

    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

header("Location: http://localhost/php-registration/admin.php");
exit();
