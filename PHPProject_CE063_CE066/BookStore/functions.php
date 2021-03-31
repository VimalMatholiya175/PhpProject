<?php
try{
	session_start();
	if(!isset($_SESSION['customer_id']))
		header('Location: accounts/login.php');

	require ('connection.php');
	$customer_id=$_SESSION['customer_id'];
	
	//add to cart
	if( isset($_GET['action']) && $_GET['action']=='add' ){
		
		$book_id=$_GET['id'];
		$q=$db->prepare("SELECT * FROM cart WHERE book_id=? AND customer_id=?;");
		$q->execute([$book_id,$customer_id]);
		$result=$q->fetch();
		if( !$result ){
			$q1=$db->prepare("INSERT INTO cart VALUES(NULL,?,?,?,?);");
			$q1->execute([$book_id,$customer_id,1,date('Y-m-d H:i:s')]);
		}

		if(!isset($_SESSION['success']))
			$_SESSION['success']='Book is successfully added to the cart !!';

		header('Location: index.php');
	}

	//increase quantity in cart
	elseif( isset($_GET['action']) && $_GET['action']=='iqty' ){
		
		$book_id=$_GET['id'];
		$q=$db->prepare("SELECT quantity FROM books WHERE id=?;");
		$q->execute([$book_id]);
		$book=$q->fetch();

		$q=$db->prepare("SELECT * FROM cart 
						 WHERE book_id=? AND customer_id=?;");
		$q->execute([$book_id,$customer_id]);
		$cart=$q->fetch();
		
		if( $cart ){		
			if($cart['quantity'] == $book['quantity']){
				if(!isset($_SESSION['error']))
					$_SESSION['error']='This book is now out of stock';
			}
			else{
				$q=$db->prepare("UPDATE cart SET quantity=? 
										WHERE id=?");
				$q->execute( [$cart['quantity']+1,$cart['id']] );
			}
		}

		header('Location: cart.php#'.$book_id);	
	}

	//decrease quantity in cart
	elseif( isset($_GET['action']) && $_GET['action']=='dqty' ){
		
		$book_id=$_GET['id'];
		$q=$db->prepare("SELECT * FROM cart 
			             WHERE book_id=? AND customer_id=?;");
		$q->execute([$book_id,$customer_id]);
		$cart=$q->fetch();
		if( $cart ){
			$q=$db->prepare("UPDATE cart SET quantity=? WHERE id=?");
			$q->execute( [$cart['quantity']-1,$cart['id']] );
			if($cart['quantity']==1){
				$q=$db->prepare("DELETE FROM cart WHERE id=?;");
				$q->execute([$cart['id']]);
			}
		}

		header('Location: cart.php#'.$book_id);
	}

	//remove book from cart
	elseif( isset($_GET['action']) && $_GET['action']=='remove' ){
		
		$book_id=$_GET['id'];
		$customer_id=$_SESSION['customer_id'];

		$q=$db->prepare("DELETE FROM cart WHERE book_id=? AND customer_id=?;");
		$q->execute([$book_id,$customer_id]);

		header('Location: cart.php#'.$book_id);	
	}

	//cancel order
    elseif( isset($_GET['action']) && $_GET['action']=='cancel' ){

        $order_id=$_GET['id'];

        $q=$db->prepare("SELECT * FROM orders WHERE id=?;");
        $q->execute([$order_id]);
        $order=$q->fetch();

        if(!$order['order_status']){
            $q=$db->prepare("SELECT quantity FROM books WHERE id=?;");
            $q->execute([$order['book_id']]);
            $book=$q->fetch();

            $q=$db->prepare("UPDATE books SET quantity=? WHERE id=?;");
            $q->execute([$book['quantity']+$order['quantity'],
                        $order['book_id']]);

            $q=$db->prepare("DELETE FROM orders WHERE id=?;");
            $q->execute([$order_id]);
        }
    	
    	header("Location: orders.php");
    }


	$db=null;
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}

?>