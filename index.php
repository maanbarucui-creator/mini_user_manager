<?php
include "db.php";

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini User Manager</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="page-header">
        <a class="back-button" href="../index.php">← Back to Main Portfolio</a>
    </div>

    <h1>Mini User Manager</h1>

    <h2>Add User</h2>

    <form action="add.php" method="POST">

       
    
    
                      <input 
            type="text" 
            name="username" 
            placeholder="Enter username" 
            required

            >

     <input 
            type="email" 
            name="email" 
            placeholder="Enter email" 
            required
        >

                          <button type="submit">Add User</button>

    </form>

    <h2>User List</h2>

    <table>

        <tr>
            <th>ID</th>
                        <th>Username</th>
            <th>Email</th>
                    <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

        <tr>

            <td>
                                      <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['username']); ?>
            </td>
                         
            <td>
                              <?php echo htmlspecialchars($row['email']); ?>
            </td>

                           <td>
        
                <a 
                    class="edit" 
                    href="edit.php?id=<?php echo $row['id']; ?>"
                >
                    Edit
                </a>

                <a 
                                   class="delete" 
                    href="delete.php?id=<?php echo $row['id']; ?>"
                                         onclick="return confirm('Are you sure you want to delete this user?');"
                >
                    Delete
                </a>

                     </td>

                              </tr>
                      
                        <?php } ?>

               </table>

</div>





</body>
</html>