<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumlijst</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Albumlijst</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Artiesten</th>
        <th>Release Datum</th>
        <th>URL</th>
        <th>Afbeelding</th>
        <th>Prijs</th>
    </tr>
    <?php
    // Verbind met de database
    require_once 'db.php';
    require_once 'classes/Album.php';
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
            echo '<tr>';
            echo '<td>' . htmlspecialchars($album->getID()) . '</td>';
            echo '<td>' . htmlspecialchars($album->getNaam()) . '</td>';
            echo '<td>' . htmlspecialchars($album->getArtiesten()) . '</td>';
            echo '<td>' . htmlspecialchars($album->getReleaseDatum()) . '</td>';
            echo '<td><a href="' . htmlspecialchars($album->getURL()) . '">' . htmlspecialchars($album->getURL()) . '</a></td>';
            echo '<td>';
            if ($album->getAfbeelding()) {
                echo '<img src="' . htmlspecialchars($album->getAfbeelding()) . '" alt="' . htmlspecialchars($album->getNaam()) . '" style="max-width: 100px;">';
            } else {
                echo '<span>Geen afbeelding beschikbaar</span>';
            }
            echo '</td>';
            echo '<td>€' . htmlspecialchars($album->getPrijs()) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="7">Er zijn geen albums beschikbaar.</td></tr>';
    }
    ?>
</table>

<div class="notice">
    <h2>Album Toevoegen:</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="add_album.php" method="post">
        <label for="album-naam">Naam:</label>
        <input type="text" id="album-naam" name="naam" required>
        <label for="album-artiesten">Artiesten:</label>
        <input type="text" id="album-artiesten" name="artiesten" required>
        <label for="album-release-datum">Release Datum:</label>
        <input type="date" id="album-release-datum" name="release_datum" required>
        <label for="album-url">URL:</label>
        <input type="url" id="album-url" name="url" required>
        <label for="album-afbeelding">Afbeelding URL:</label>
        <input type="url" id="album-afbeelding" name="afbeelding">
        <label for="album-prijs">Prijs:</label>
        <input type="number" id="album-prijs" name="prijs" step="0.01" required>
        []
        <button type="submit">Toevoegen</button>
    </form>
</div>
</body>
</html>