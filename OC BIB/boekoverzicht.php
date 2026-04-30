<?php
session_start();
include("server/functions.php");

$isbns = getIsbnAllBooks();
$boeken = [];
foreach ($isbns as $isbn) {
    $boeken[] = getInfoBook($isbn);
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./opmaak/opmaak2.css">
    <title>Library Book Overview</title>
</head>

<body>
    <div class="page-shell book-overview-shell">
        <header class="page-header">
            <h1>Boekoverzicht</h1>
        </header>

        <div class="book-grid">
            <?php if (empty($boeken)) { ?>
                <div>Er zijn nog geen boeken beschikbaar.</div>
            <?php } else { ?>

                <article class="boek-card">
                    <div class="boek-card-foto">
                        <?php if (!empty($boek['Cover'])) { ?>
                            <img src="<?= htmlspecialchars($boek['Cover']) ?>">
                        <?php } ?>
                    </div>

                    <div class="boek-card-body">
                        <h2 class="boek-card-title"><?= htmlspecialchars($boek['Title']) ?></h2>
                        <p class="boek-card-meta">Auteur: <?= htmlspecialchars($boek['Author']) ?></p>
                        <p class="boek-card-field">Genre: <?= htmlspecialchars($boek['Genre']) ?></p>
                        <p class="boek-card-field">Pagina's: <?= htmlspecialchars($boek['Pages']) ?></p>
                        <p class="boek-card-field">Leeftijd: <?= htmlspecialchars($boek['Age']) ?></p>
                        <p class="boek-card-availability <?= $beschikbaarheid ?>">
                            <?= $beschikbaarheid ?>
                        </p>
                    </div>
                </article>

            <?php } ?> 
        </div>
    </div>
</body>
</html>