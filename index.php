<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Crud</title>
</head>
<body>
    <h2>User Crud</h2>
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="image">Rasm:</label>
        <input type="file" id="image" name="image" required><br><br>
        
        <button type="submit">Add User</button>
    </form>
    <form action="read.php" method="post" enctype="multipart/form-data">
        <button type="submit">Read user</button>
    </form>
</body>
</html>
