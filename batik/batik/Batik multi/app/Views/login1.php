<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">
	<title>Login</title>
</head>
<body class="bg-secondary">
	<div class="container">
		<div class="row">
			<div class="col-4 m-5">
				<div class="card p-3">
					<h3 class="text-center">Log In</h3>
					<form action='<?= base_url('home/auth'); ?>' method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control" placeholder='' aria-describedby="helpid">
						</div>

						<div class="form-group">
							<label for="pass">Password</label>
							<input type="text" name="pass" id="pass" class="form-control" placeholder='' aria-describedby="helpid">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
