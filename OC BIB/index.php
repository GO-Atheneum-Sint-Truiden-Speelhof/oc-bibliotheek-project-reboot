 <!doctype html>
<html lang=nl>
<head>
	<meta charset=utf-8>
	<meta name="robots" content="all">
	<link rel="stylesheet" type="text/css" href="styles/opmaak.css">
	<title>Invul Formulier</title>
</head>

<header>
	<h1>Library Book Register</h1>
</header>

<body>
	<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
		<div class="alert alert-success" role="alert">
			Boek succesvol toegevoegd!
		</div>
	<?php } ?>
	<?php if(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
		<div class="alert alert-danger" role="alert">
			Fout bij toevoegen van boek.
		</div>
	<?php } ?>
	<div class="card-header"><h3 class="text-center fond-weight-light my-4">Boek toevoegen></h3></div>
	<div class="card-body">
		<form action="registerBook.php" method="post">
			<div class="row mb-3">
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form control" name="isbn" type="text" placeholder="Enter ISBN" />
						<label for="isbn">ISBN-nummer</label>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form control" name="titel" type="text" placeholder="Enter titel" />
						<label for="titel">Titel</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form control" name="auteur" type="text" placeholder="Enter author" />
						<label for="auteur">Auteur</label>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form control" name="cover" type="file" placeholder="Enter photo cover" />
						<label for="cover">Cover photo</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form control" name="genre" type="text" placeholder="Enter genre" />
						<label for="genre">Genre</label>
					</div>
				</div>
			</div>

			<div class="col-md">
				<button type="submit" class="btn btn-primary">Toevoegen</button>
			</div>

		</form>
	</div>
</body>
</html>