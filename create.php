<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT); 
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 

    if ($username !== false && $age !== false && $email !== false && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'png', 'jpeg'];
        $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            $targetDirectory = 'uploads/';
            $targetFile = $targetDirectory . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $users = json_decode(file_get_contents('users.json'), true);
                $users[] = [
                    'id' => uniqid(),
                    'username' => $username,
                    'age' => $age,
                    'email' => $email,
                    'image' => $targetFile,
                ];
                file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
            } else {
                die("Faylni yuklashda xatolik bor.");
            }
        } else {
            die("Faqat jpg, png, jpeg ko'rinishidagi fayllarni yuklang.");
        }
    } else {
die("Iltimos, ma'lumotlaringizni to'g'ri kiriting!");
}header('Location: index.php');
exit;
}