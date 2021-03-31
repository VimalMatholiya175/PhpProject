<?php
    session_start();
    
    if(!isset($_SESSION['is_logged_in']))
        header('Location:index.php');
    
    $success=null;
    if(isset($_POST['save'])){
        $isbn=$_POST['isbn'];
        $title=$_POST['title'];
        $author=$_POST['author'];
        $price=$_POST['price'];
        $genre=$_POST['genre'];
        $language=$_POST['language'];
        $quantity=$_POST['quantity'];
        $publisher=$_POST['publisher'];
        $published_year=date('Y',strtotime($_POST['published_date']));
        $dir='C:\\xampp\\htdocs\\BookStore\\images\\';
        $dir=$dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $dir);
        $image='/BookStore/images/'. basename($_FILES['image']['name']);
        try{
            require ('connection.php');
            $stmt=$db->prepare("INSERT INTO books VALUES(NULL,?,?,?,?,?,?,?,?,?,?);");
            $result=$stmt->execute([$isbn,$title,$language,$author,$price,$quantity,$genre,$publisher,$published_year,$image]);
            if($result){
                $success="Book is added successfully";
            }
            $db=null;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Add Book</title>
</head>
<body class="mx-5 my-4">
    <?php if($success){ ?>
        
    <div class="alert alert-success alert-dismissible fade show text-center text-white my-2" role="alert" style="background-color: #51b97f;">
        <?php echo $success; ?>
        <a href="add_book.php" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
    </div>
        
    <?php $success=null; } ?>
    <h3>
        <a href="index.php" class="btn btn-success btn-sm">
            Back
        </a>
        <span class="mx-5">Add Book</span>
    </h3>
    <form action="add_book.php" method="post" enctype="multipart/form-data" class="mx-5">
        <table cellpadding="4" class="mx-5">
            <tr>
                <th>ISBN Number</th>
                <td><input type="number" class="form-control" id="isbn" name="isbn"></td>
            <tr>
            <tr>
                <th>Title</th>
                <td><input type="text" class="form-control" id="title" name="title"></td>
            </tr>
            <tr>
                <th>Language</th>
                <td><input type="text" class="form-control" id="language" name="language"></td>
            </tr>
            <tr>
                <th>Author</th>
                <td><input type="text" class="form-control" id="author" name="author"></td>
            </tr>
            <tr>
                <th>Genre</th>
                <td><input type="text" class="form-control" id="genre" name="genre"></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><input type="number" class="form-control" id="price" name="price"></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><input type="number" class="form-control" id="quantity" name="quantity"></td>
            </tr>
            <tr>
                <th>Publisher</th>
                <td><input type="text" class="form-control" id="publisher" name="publisher"></td>
            </tr>
            <tr>
                <th>Published Date</th>
                <td><input type="date" class="form-control" id="published_date" name="published_date"></td>
            </tr>
            <tr>
                <th>Book Image</th>
                <td><input type="file" class="form-control" id="image" name="image"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="reset" value="Clear" class="btn btn-primary w-25">
                <input type="submit" value="Save" name="save" class="btn btn-primary mx-2 w-25"></td>
            </tr>
        </table>
    </form>

</body>
</html>