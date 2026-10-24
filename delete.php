<?php

include "db.php";

if (!isset($_GET["id"])) {
    die("User ID not found.");
}

$id = $_GET["id"];

$stmt = $conn->prepare(
    "DELETE FROM users WHERE id = ?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit();

?>