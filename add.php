<?php 
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $username = $_POST['username']; 
    $email = $_POST['email']; 

    // Corrected SQL syntax 'VALUES' and variable name '$stmt'
    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)"); 
    
    // Corrected variable name '$stmt' and added missing quotes for types
    $stmt->bind_param("ss", $username, $email); 
    
    $stmt->execute(); 
    $stmt->close(); // Removed duplicate close() call
    
    header('Location: index.php'); 
    exit(); 
} 
?>
