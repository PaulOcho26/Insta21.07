<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Insta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1> Insta du lundi 21 juillet </h1>

    <form action="upload-photo.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture">
        <button>Envoyer</button>
            </form>
<div class="gallery">
<?php
// 1. Ouvre le dossier des images
$dir = 'photos';
$photos = [];

// 2. Utilisation de readdir pour remplir ton tableau
if (is_dir($dir)) {
    $dh = opendir($dir);
    while (($file = readdir($dh)) !== false) {
        // Ajoute seulement les fichiers images
        if (preg_match('/\.(jpe?g|png|gif)$/i', $file)) {
            $photos[] = $file;
        }
    }
    closedir($dh);
    // Trie du plus récent au plus vieux (optionnel)
    rsort($photos);
}

// 3. Affichage avec la boucle foreach (obligatoire)
foreach ($photos as $img) {
    echo '<img src="photos/' . htmlspecialchars($img) . '" alt="Photo">';
}
?>
</div>

</body>
</html>