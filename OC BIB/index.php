<?php
session_start();
$message = '';
$alertClass = '';
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] === 'success') {
        $message = 'Boek succesvol toegevoegd!';
        $alertClass = 'alert-success';
    } else {
        $message = 'Fout bij toevoegen van boek.';
        $alertClass = 'alert-error';
    }
    unset($_SESSION['status']);
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/opmaak.css">
    <title>Library Book Register</title>
</head>
<body>
    <div class="page-shell">
        <header class="page-header">
            <h1>Library Book Register</h1>
            <p>Voeg eenvoudig een nieuw boek toe aan de bibliotheek</p>
        </header>

        <main class="card">
            <div class="card-header">
                <h2>Boek toevoegen</h2>
            </div>
            <div class="card-body">
                <?php if ($message): ?>
                    <div class="alert <?= htmlspecialchars($alertClass) ?>"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>

                <form action="registerBook.php" method="post" enctype="multipart/form-data">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="isbn">ISBN-nummer</label>
                            <input id="isbn" class="form-control" name="isbn" type="text" placeholder="1234567890" required>
                        </div>
                        <div class="form-group">
                            <label for="titel">Titel</label>
                            <input id="titel" class="form-control" name="titel" type="text" placeholder="Vul titel in" required>
                        </div>
                        <div class="form-group">
                            <label for="auteur">Auteur</label>
                            <input id="auteur" class="form-control" name="auteur" type="text" placeholder="Vul auteur in" required>
                        </div>
                        <div class="form-group">
                            <label for="pages">Pagina's</label>
                            <input id="pages" class="form-control" name="pages" type="number" placeholder="Aantal pagina's" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input id="genre" class="form-control" name="genre" type="text" placeholder="Bijv. roman, thriller" required>
                        </div>
                        <div class="form-group file-group">
                            <label for="cover">Cover foto</label>
                            <input id="cover" class="form-control" name="cover" type="file" accept="image/*">
                        </div>
                        <div class="form-group full-width">
                            <label for="summary">Samenvatting</label>
                            <textarea id="summary" class="form-control" name="summary" rows="5" placeholder="Korte beschrijving van het boek"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Toevoegen</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>