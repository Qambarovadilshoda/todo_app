<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        $users = json_decode(file_get_contents('users.json'), true); 
        $user = null;
        
        foreach ($users as $u) {
            if ($u['id'] === $id) {
                $user = $u; 
                break; 
            }
        }
        
        if ($user) {
            echo '<form action="update.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id" value="' . $user['id'] . '">'."<br><br>";
            echo '<label for="username">Username:</label>';
            echo '<input type="text" id="username" name="username" value="' . $user['username'] . '" required>'."<br><br>";
            echo '<input type="hidden" name="id" value="' . $user['id'] . '">'."<br><br>"; 
            echo '<label for="age">Age:</label>';
            echo '<input type="number" id="age" name="age" value="' . $user['age'] . '" required>'."<br><br>";
            echo '<input type="hidden" name="id" value="' . $user['id'] . '">'."<br><br>"; 
            echo '<label for="email">Email:</label>';
            echo '<input type="text" id="email" name="email" value="' . $user['email'] . '" required>'."<br><br>";
            echo '<input type="hidden" name="id" value="' . $user['id'] . '">'."<br><br>";
            echo '<label for="image">Photo:</label>';
            echo '<input type="file" id="image" name="image" value="' . $user['image'] . '" required>'."<br><br>"; 
            echo '<button type="submit">Update User</button>'."<br>"; 
            echo '</form>';
        } else {
            echo '<p>User not found.</p>';
        }
    } else {
        echo '<p>Invalid request.</p>';
    }
    ?>
    <a href="index.php">Ortga qaytish</a> 
</body>
</html>
