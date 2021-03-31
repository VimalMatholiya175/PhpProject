<?php
$error=null;
if(isset($_POST['signup'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobileno=$_POST['mobileno'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirmpassword'];

    try{
        $db= new PDO('mysql:host=127.0.0.1:3307;dbname=book_store','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt=$db->prepare("SELECT * FROM customer;");
        $stmt->execute();

        while($result=$stmt->fetch()){
            if($result['email']===$email)
                $error="Email is already taken";
            elseif($result['username']===$username)
                $error="Username is already taken";
            elseif($password != $cpassword)
                $error="Passowrd doesn't match";
        }
        if(!$error){
            $password=password_hash($password,PASSWORD_DEFAULT);
            $stmt=$db->prepare("INSERT INTO customer VALUES(NULL,?,?,?,?,?,?);");
            $stmt->execute([$username,$email,$password,$firstname,$lastname,$mobileno]);
            header('Location:login.php');
        }

        $db=null;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>SignUp</title>
</head>
<body>
    <?php require ('navbar.php'); ?>

    <?php if($error){ ?>
        
        <div class="alert alert-warning alert-dismissible fade show text-center 
        text-white my-2" role="alert" style="background-color:#ee5b5b">
            <strong><?php echo $error; ?></strong>
            <a href="signup.php" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    
    <?php $error=null; } ?>

    <div class="container my-4 p-5 border" style="width:460px;">
        <h3 class="text-center">Sign Up</h3><br>

        <form action="signup.php" method="post" class="row">
            <div class="mb-2 col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname" pattern="[A-Za-z]+" required>
            </div>
            <div class="mb-2 col-md-6">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="lastname" pattern="[A-Za-z]+" required>
            </div>
            <div class="mb-2 col-md-12">
                <label for="mobileno" class="form-label">Mobile No.</label>
                <input type="tel" class="form-control" name="mobileno" id="mobileno" pattern="[0-9]{10}" required>
            </div>
            <div class="mb-2 col-md-12">
                <label for="username" class="form-label">Userame</label>
                <input type="text" class="form-control" name="username" id="username" pattern="^[a-z]+[0-9]*$" required>
            </div>

            <div class="mb-2 col-md-12">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-2 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" minlength="8" pattern="[a-zA-Z]+[0-9]*" required>
            </div>
            <div class="mb-2 col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmpassword" id="cpassword" pattern="[a-zA-Z]+[0-9]*" minlength="8" required>
            </div>
            <div class="form-text col-md-12 mb-3">
                Password must be at least 8 character long and should contain characters.
            </div>
            <div class="col-md-12">
                <input type="reset" class="btn btn-primary float-end mt-2 w-25">

                <input type="submit" value="SignUp" name="signup" class="btn btn-primary mt-2 float-end mx-2 w-25">
            </div>
        </form>
    </div>
</body>
</html>