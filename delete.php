<?php
if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    $users = json_decode(file_get_contents('users.json'), true); 
    foreach ($users as $key => $user) {
        if ($user['id'] === $id) { 
            if (isset($user['image'])) {
                unlink($user['image']);
            }
            unset($users[$key]);
            break; 
    }
}
file_put_contents('users.json', json_encode(array_values($users), JSON_PRETTY_PRINT));
header('Location: index.php');
exit;
}