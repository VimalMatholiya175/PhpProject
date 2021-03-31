<?php
try{
	session_start();
	require ('connection.php');

	$q=$db->prepare("SELECT DISTINCT genre FROM books;");
	$q->execute();
	$all_genres=$q->fetchAll(PDO::FETCH_ASSOC);	

	if(isset($_GET['genre'])){
		$q=$db->prepare("SELECT DISTINCT genre FROM books 
			             WHERE genre=?;");
		$q->execute([$_GET['genre']]);
		$selected_genres=$q->fetchAll(PDO::FETCH_ASSOC);	
	}
	else
		$selected_genres=$all_genres;

	$q=$db->prepare("SELECT * FROM books;");
	$q->execute();
	$all_books=$q->fetchAll(PDO::FETCH_ASSOC);
	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Book Store</title>
</head>
<body>

<?php require ('navbar.php'); ?>

<?php if(isset($_SESSION['success'])){ ?>

	<div class="alert alert-success alert-dismissible fade show text-center my-2" role="alert" style="background-color:#d1e7dd;color:#0f5132">
        <strong><?php echo $_SESSION['success']; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php unset($_SESSION['success']); } ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 my-2 g-2">
			<hr class="text-primary">
			<h5 class="mx-2">Genres</h5>
			<hr class="text-primary">			

			<!--rowurlencode()- for including space in query string-->
  			<div class="mx-2 my-3">
    			<?php foreach($all_genres as $genre){ ?>
    				<a href="index.php?genre=<?php 
    				    echo rawurlencode($genre['genre']); ?>" 
    					class="my-2 d-block">
    					<?php echo $genre['genre']; ?>		
    				</a>
    			<?php } ?>
  			</div>
		</div>
		
		<div class="col-md-10 g-2 my-2 px-5">		
		<?php foreach($selected_genres as $genre){ ?>
			<hr class="text-primary">
			<h5><?php echo $genre['genre']; ?></h5>
			<hr class="text-primary">
			<div class="row row-cols-1 row-cols-md-4">
			<?php foreach($all_books as $book){ 
				if($book['genre']==$genre['genre']){ ?>
				<div class="col" id="<?php echo $book['id']; ?>">
					<div class="card h-100" data-bs-toggle="modal" 
						data-bs-target="#book<?php echo $book['id']; ?>">
						<img src="<?php echo $book['image'];?>" 
							class="card-img-top" />
						<div class="card-body">
							<h6 class="d-inline-block">
								<?php echo $book['title']; ?></h6>
							<h6 class="text-primary">
								By <?php echo $book['author']; ?>
							</h6>
							<h5>
								&#x20B9;<?php echo $book['price']; ?>
							</h5>
						</div>
					</div>
				</div>
			<?php } }  ?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

<?php require ('book_details.php'); ?>

</body>
</html>