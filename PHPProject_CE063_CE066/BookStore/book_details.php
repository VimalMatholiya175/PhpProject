<?php foreach($all_books as $book){ ?> 
<div class="modal fade" id="book<?php echo $book['id']; ?>" tabindex="-1" aria-labelledby="bookdetails" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookdetails">Book Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-4">
                    <img src="<?php echo $book['image'];?>" class="card-img-top" style="width: 245px;height: 350px;">
                </div>
                <div class="col-md-8">
                    <h4 class="d-inline-block"> <?php echo $book['title']; ?> 
                        (<?php echo $book['language']; ?>)</h4>
                    <p class="text-primary">
                        By <?php echo $book['author']; ?></p>
                    <h4>&#x20B9;<?php echo $book['price']; ?></h4>
                    <h6>Delivery in 4 Days | 
                        <span  class="text-success"> Free<span></h6>
                    <table class="my-3" cellpadding="7">
                        <tr>
                            <th width="150px">Genre</th>
                            <td><?php echo $book['genre']; ?></td>
                        </tr>
                        <tr>
                            <th>Publisher</th>
                            <td><?php echo $book['publisher']; ?></td>
                        </tr>
                        <tr>
                            <th>Published Year</th>
                            <td><?php echo $book['published_year']; ?></td>
                        </tr>
                    </table>

                    <?php if(!$book['quantity']){ ?>

                    <button class="btn btn-danger btn-sm">
                        Out Of Stock
                    </button>
                    
                    <?php }elseif(isset($_SESSION['customer_id'])){
                        $q=$db->prepare("SELECT quantity FROM cart 
                            WHERE book_id=? AND customer_id=?;");
                        $q->execute([$book['id'],$_SESSION['customer_id']]);
                        if($q->fetch()){ ?>
                    
                    <a class="btn btn-dark" href="cart.php">
                        Go To Cart
                    </a>
                    
                    <?php }else{ ?>
                    
                    <a class="btn btn-dark" href="functions.php?
                        id=<?php echo $book['id']; ?>&action=add">
                        Add To Cart</a>
                    
                    <?php } }else{ ?>
                    
                    <a class="btn btn-dark" href="functions.php?
                        id=<?php echo $book['id']; ?>&action=add">
                        Add To Cart</a>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>