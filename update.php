<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $newUsername = $_POST['username']; 
    $newAge = $_POST['age']; 
    $newEmail = $_POST['email']; 
    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $key => $user) {
        if ($user['id'] === $id) {
            if (isset($user['image'])) {
                unlink($user['image']);
            }
            $users[$key]['username'] = $newUsername; 
            $users[$key]['age'] = $newAge; 
            $users[$key]['email'] = $newEmail;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $allowedExtensions = ['jpg', 'png', 'jpeg'];
                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    $targetDirectory = 'uploads/';
                    $targetFile = $targetDirectory . basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                    $users[$key]['image'] = $targetFile;
                }
            }
            break;
        }
    }
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit; 
} else {
    header('Location: error.php');
    exit;
}
