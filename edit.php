<?php 
include 'db.php'; 

if (!isset($_GET['id'])) { 
    die('Users ID not found.'); 
} 

$id = $_GET['id']; 


$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?"); 
$stmt->bind_param("i", $id); 
$stmt->execute(); 
$result = $stmt->get_result(); 
$user = $result->fetch_assoc(); 
$stmt->close(); 

if (!$user) { 
    die('User not found.'); 
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $username = $_POST['username']; 
    $email = $_POST['email']; 
    
    $stmt = $conn->prepare("UPDATE users SET username = ?, 
    email = ? WHERE id = ?"); 
    $stmt->bind_param("ssi",
     $username, $email, $id); 
    $stmt->execute(); 
    $stmt->close(); 
    $conn->close(); 
    
    header("Location: index.php"); 
    exit(); 
} 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Edit User</h1>

    <form method="POST">

        <label>Username:</label>

        <input 
            type="text"
            name="username"
            value="<?php echo htmlspecialchars($user['username']); ?>"
            required
        >

        <label>Email:</label>

        <input 
            type="email"
            name="email"
            value="<?php echo
             htmlspecialchars($user['email']); ?>"
            required
        >

        <button type="submit">Update User</button>

        <a class="back" 
        href="index.php">Cancel</a>

    </form>

</div>

</body>

</html>
