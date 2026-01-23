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
	
	<div class="card-header"><h3 class="text-center fond-weight-light my-4">Boek toevoegen></h3></div>

	<form action="" method="post">
		<div class="row mb-3">
			<div class="col-md-6">
				<div class="form-floating mb-3 mb-md-0">
					<input class="form control" name="isbn" type="text" placeholder="Enter ISBN" />
					<label for="isbn">ISBN-nummer</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-floating mb-3 mb-md-0">
					<input class="form control" name="titel" type="text" placeholder="Enter titel" />
					<label for="titel">Titel</label>
				</div>
			</div>
		</div>
		
		<div class="col-md">
			<button type="button" onclick="Toevoegen()">Toevoegen</button>
		</div>
	</form>
</body>

</html>