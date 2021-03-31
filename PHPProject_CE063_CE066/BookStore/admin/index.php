<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Admin Pannel</title>
</head>
<body>
	<div class="container my-5 p-5 text-center">
		<h3 class="text-center my-5">Admin Pannel</h3>
		<a href="/BookStore/index.php" class="mx-3">Home</a>
		<?php session_start(); 
			  if(!isset($_SESSION['is_logged_in'])){ ?>
		<a href="login.php" class="mx-3">Login</a>
		<?php }else{ ?>
		<a href="add_book.php" class="mx-3">Add Book</a>
		<a href="orders.php" class="mx-3">View Orders</a>
		<a href="logout.php" class="mx-3">Logout</a>
		<?php } ?>
	</div>
</body>
</html>