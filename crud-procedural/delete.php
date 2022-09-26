<?php
include 'connect.php';

$userid = $_GET['userid'];
try {
    // sql to delete a record
    $sql = "DELETE FROM users WHERE userid = $userid";
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


header("Location: http://localhost/php-registration/admin.php");
exit();
