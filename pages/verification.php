<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        session_start();
        $email = $_SESSION['emailv'];
        require_once "../scripts/database.php";
        $sql = "SELECT * FROM verification WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $role = $_SESSION['rolev'];
        if (isset($_POST["verify"])) {
           $code = $_POST["code"];
            
            if ($user) {
                if ($code==$user["code"]) {
                    if($role=='student'){
                    $sql = "UPDATE student SET email_verification='true' WHERE email = '$email'";
                    }
                    if($role=='teacher'){
                        $sql = "UPDATE teacher SET email_verification='true' WHERE email = '$email'";
                    }
                    if(mysqli_query($conn, $sql)){
                        header("Location: login.php");
                        die();
                    }
                    else{
                        echo "<div class='alert alert-danger'>Something went wrong</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>Code is incorrect</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match $email</div>";
            }
        }
        ?>
      <form action="verification.php" method="post">
        <div class="form-group">
            <input type="text" placeholder="Enter Code:" name="code" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="verify" class="btn btn-primary">
        </div>
      </form>
     <div><p>Didn't get your email <a href="new_verification_code.php">Click here to resend it</a></p></div>
    </div>
</body>
</html>