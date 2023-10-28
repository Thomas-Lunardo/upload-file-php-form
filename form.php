<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $upload_dir = '/home/lunardo/Téléchargements';
    $uploadFile = $upload_dir . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    $maxFileSize = 10000000;

    if( (!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type jpg, png, gif ou webp !';
    }
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    if (empty($errors)) 
    {
        move_uploaded_file($_FILES['avatar']['name'], $uploadFile);
}

    }

    if(!empty($errors))
    {
        print_r($uploadFile) . '</br>';
    }

?>

<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homer upload file</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header></header>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
    <label for="imageUpload">Choissisez une image</label>
    <input type="file" name="avatar" id="imageUpload">
    <button name ="send" type="submit">Envoyer</button>
    </form>
    </div>
    <footer></footer>
</body>
</html>