<?php
$users = json_decode(file_get_contents('users.json'), true);
if ($users === null) {
    echo "JSON faylini ochishda xatolik bor!"; 
    exit; 
}
echo "<h1>Users:</h1>";
foreach ($users as $user) {
    echo "<ul>";
    echo "<li>User: {$user['username']}</li>";
    echo "<li>Age: {$user['age']}</li>";
    echo "<li>Email: {$user['email']}</li>";

    if (isset($user['image'])) {
        echo '<li><img src="' . $user['image'] . '" alt="Photo user\'s" style="max-width: 100px;"></li>';
    } else {
        echo "<li>Rasm mavjud emas</li>";
    }

    echo "<a href='edit.php?id={$user['id']}'>Edit</a>"." ";
    echo "<a href='delete.php?id={$user['id']}'>Delete</a>";
    echo "</ul>";

}

