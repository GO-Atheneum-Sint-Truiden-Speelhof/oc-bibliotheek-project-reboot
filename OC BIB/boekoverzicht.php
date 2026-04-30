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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/opmaak.css">
    <title>Boekoverzicht</title>
    <link rel="stylesheet" type="text/css" href="./opmaak/opmaak2.css">
    <title>Library Book Overview</title>
</head>
<body>
    <div class="page-shell">
        <h1>Boekoverzicht</h1>
        <div class="boek-grid">
            <?php if (empty($boeken)) { ?>
                <div>Er zijn nog geen boeken beschikbaar.</div>
            <?php } else {
                foreach ($boeken as $boek) {
            ?>
            <article class="boek-card">
                <div class="boek-card-foto">
                    <?php if (!empty($boek['Cover'])) { ?>
                        <img src="<?= htmlspecialchars($boek['Cover']) ?>">
                    <?php } ?>
                </div>
                <div class="boek-card-body">
                    <h2><?= htmlspecialchars($boek['Title']) ?></h2>
                    <p>Auteur: <?= htmlspecialchars($boek['Author']) ?></p>
                    <p>Genre: <?= htmlspecialchars($boek['Genre']) ?></p>
                    <p>Pagina's: <?= htmlspecialchars($boek['Pages']) ?></p>
                    <p>Leeftijd: <?= htmlspecialchars($boek['Age']) ?></p>
                </div>
            </article>
            <?php }
            } ?>
        </div>
    </div>
</body>
</html>