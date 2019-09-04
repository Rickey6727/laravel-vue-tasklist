<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laravel Vue TaskList</title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
		<link rel="apple-touch-icon" href="https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwinvfCBu7bkAhVJCqYKHej2BAcQjRx6BAgBEAQ&url=http%3A%2F%2Fwww.appbank.net%2F2012%2F06%2F21%2Fiphone-application%2F430459.php&psig=AOvVaw2ijgbwS5INpmDRgTJeVPJ7&ust=1567662215726781" />
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">
					<h1>Task List</h1>
					</a>
				</div>
			</div>
		</nav>
		<div id="app">
			<task-list/>
		</div>
		<script src=" {{ mix('js/app.js') }} "></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>
