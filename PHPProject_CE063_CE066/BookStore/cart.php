<?php
try{
	session_start();
	if(!isset($_SESSION['customer_id']))
		header('Location: accounts/login.php');

	require ('connection.php');
	$customer_id=$_SESSION['customer_id'];

	//view cart
	$q=$db->prepare("SELECT book_id,quantity FROM cart 
					WHERE customer_id=? ORDER BY date_added;");
	$q->execute([$customer_id]);
	$all_carts=$q->fetchAll();

	$quantity_in_cart=array();
	$all_books=array();
	$total=0;
	foreach($all_carts as $cart){
		$q=$db->prepare("SELECT * FROM books WHERE id=?;");
		$q->execute([$cart['book_id']]);
		$quantity_in_cart[$cart['book_id']]=$cart['quantity'];
		$all_books[]=$q->fetch(PDO::FETCH_ASSOC);
	}
	

	$db=null;
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
	<title>Cart</title>
</head>
<body>
	
<?php require ('navbar.php'); ?>

<?php 
	if(!isset($_SESSION['customer_id']))
		header('Location: accounts/login.php');
	if(isset($_SESSION['total_books']) && $_SESSION['total_books']==0) {
?>

	<div class="d-flex justify-content-center my-5">
    	<img src="images/empty_cart.png">
	</div>
	<br>
	<div class="d-grid gap-2 col-2 mx-auto">
    	<a class="btn btn-success btn-lg" href="index.php">Shop Now</a>
	</div>
	
<?php }else{ ?>

<?php if(isset($_SESSION['error'])){ ?>

	<div class="alert alert-danger alert-dismissible fade show text-light text-center my-2" role="alert" style="background-color:#ee5b5b">
        <strong><?php echo $_SESSION['error']; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php unset($_SESSION['error']); } ?>

<div class="container">
    <div class="row">
    <div class="col-md-6 mt-3">
        <hr class="text-primary">
        <h4 class="mb-4">Your Cart</h4>
        <hr class="text-primary">
        <?php foreach($all_books as $book){ 
			  $total+=$book['price']*$quantity_in_cart[$book['id']]; ?>
        <div class="card mb-3" id="<?php echo $book['id']; ?>">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $book['image'];?>" 
                    class="card-img-top" />
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $book['title']."(".$book['language'].")"; ?></h5>
                    <sup>&#x20B9;</sup>
                    <h5 class="d-inline-block">     
                        <?php echo $book['price']; ?> 
                    </h5>

                    <br>
                    <table cellpadding="7">
                    	<tr>
                        	<th>Genre</th>
                        	<td><?php echo $book['genre']; ?></td>
                    	</tr>
                    	<tr>
                        	<th>Author</th>
                        	<td><?php echo $book['author']; ?></td>
                    	</tr>
                    	<tr>
                        	<th>Publisher</th>
                        	<td><?php echo $book['publisher']; ?></td>
                    	</tr>
                    </table>
                
                    <div class="btn-group btn-block mt-2" role="group" aria-label="Basic outlined example">
                    	<!-- <form action="function.php#<?php echo $book['id'];?>">
                    	<input type="hidden" name="id" 
                    	value="<?php echo $book['id']; ?>">
                    	<input type="hidden" name="action" 
                    	value="dqty"> -->
                        <a href="functions.php?
  							 id=<?php echo $book['id']; ?>&action=dqty"class="btn btn-outline-dark btn-sm">
  						 	-
  						</a>
  						<!-- <input type="submit" value="-" class> -->
  					<!-- </form> -->
  						<a href="#" class="btn btn-outline-dark btn-sm">
  							<?php echo $quantity_in_cart[$book['id']]; ?>
  						</a>
  						<a href="functions.php?
  							id=<?php echo $book['id']; ?>&action=iqty" class="btn btn-outline-dark btn-sm">
  						 	+
  						</a>
                    </div>
                    <a href="functions.php?
						id=<?php echo $book['id']; ?>&action=remove" class="btn btn-danger btn-sm mt-2 mx-5">	
						Remove
					</a>
                </div>
                </div>
            </div>
        </div>
        <?php } ?>   
    </div>
    <div class="col-md-1 mt-3"></div>
    <div class="col-md-5 mt-3">
        <hr class="text-primary">
        <h4 class="mb-4">Price Details</h4>
        <hr class="text-primary">
        <table class="w-100">
            <tr>
                <th class="float-start my-2">Total Amount</th>
                <td class="float-end">
                   	&#x20B9;<?php echo $total; ?>		
                </td>
            </tr>
            <tr>
                <th class="float-start my-2">Delivery Charge</th>
                <td class="float-end text-success">Free</td>
            </tr>
            <tr>
               <th class="float-start my-2">Amount To Pay</th>
               <td class="float-end">
                	&#x20B9;<?php echo $total; ?>
            	</td>
           </tr>
       </table>
        <hr class="text-primary">
        <a class="btn btn-primary my-3" href="checkout.php">Checkout</a>
    </div>
    </div>
</div>	

<?php } ?>

</body>
</html>
