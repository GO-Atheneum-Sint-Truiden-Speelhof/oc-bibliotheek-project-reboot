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
	<div class="jumbotron" class="display-4">

	<form action="" method="post">

		<div class="col tegel" class="form-container">
			<div class="col">
				<label for="titel">Titel</label>
				<p><input type="text" name="titel" size="30"></p>
			</div>

			<div class="col">
				<label for="coverfoto">Cover foto</label>
				<p><input type="file" id="coverfoto" name="coverfoto" accept="image/png, image/jpeg, image/webp"></p>
			</div>
		</div>

		<div class="col tegel" class="form-container">
			<div class="col">
				<label for="auteur">Auteur</label>
				<p><input type="text" name="auteur" size="30"></p>
			</div>

			<div class="col">
				<label for="isbn">ISBN</label>
				<p><input type="text" name="isbn" size="30"></p>
			</div>
		</div>

		<div class="col tegel" class="form-container">
			<div class="col">
				<label for="sumary">Summary</label>
				<p><input type="text" name="sumary" size="60"></p>
			</div>

			<div class="col">
				<label for="genre">Genre</label>
				<p>
					<select>
						<option value="waarde1">Psychologie</option>
						<option value="waarde2" selected>Action</option>
						<option value="waarde3">Horror</option>
					</select>
				</p>

				<div class="col-md">
					<button type="button" onclick="Toevoegen()">Toevoegen</button>
				</div>

			</div>
		</div>
	</div>
</body>

</html>

<div class="card-header"><h3 class="text-center fond-weight-light my-4">Boek toevoegen></h3></div>

<form action="" method="post">
	<div class="row mb-3">
		<div class="col-md-6">
			<div class="form-floating mb-3 mb-md-0">
				<input class="form control" name="isbn" type="text" placeholder="Enter ISBN" />
				<label for="isbn">ISBN-nummer</label>
			</div>
		</div>
		
</form>