<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .album {
            background: white;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        .album img {
            max-width: 150px;
            margin-right: 20px;
        }
        .album-details {
            flex-grow: 1;
        }
        .album-details h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Albums</h1>
    <?php
    // Verbind met de database
    require_once 'db.php';
    // Haal alle albums op
    try {
        $albums = Album::getAll($db);
    } catch (Exception $e) {
        // Toon een foutmelding indien nodig
        echo '<p>Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage()) . '</p>';
        die();
    }

    // Toon alle albums
    if (!empty($albums)) {
        foreach ($albums as $album) {
            echo '<div class="album">';
            echo '<img src="' . htmlspecialchars($album->Afbeelding) . '" alt="' . htmlspecialchars($album->Naam) . '">';
            echo '<div class="album-details">';
            echo '<h2>' . htmlspecialchars($album->Naam) . '</h2>';
            echo '<p>Artiesten: ' . htmlspecialchars($album->Artiesten) . '</p>';
            echo '<p>Release Datum: ' . htmlspecialchars($album->Release_Datum) . '</p>';
            echo '<p>URL: <a href="' . htmlspecialchars($album->URL) . '">' . htmlspecialchars($album->URL) . '</a></p>';
            echo '<p>Prijs: €' . htmlspecialchars($album->Prijs) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>Er zijn geen albums beschikbaar.</p>';
    }
    ?>
</div>
</body>
</html>