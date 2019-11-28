<?php
include('Loginheader.html');
require('DataBase/connect.php');
session_start();
if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string(Connect(),$_POST['username']);
    $password = mysqli_real_escape_string(Connect(),$_POST['password']);
    $errors  = array();

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }
    if(count($errors) == 0){
        $query = "SELECT * FROM account WHERE username='".$username."' AND password='".$password."'";
        $results = mysqli_query(Connect(),$query);

        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header("Location: Main/");
        }else{
            array_push($errors,"username/password is wrong");
        }
    }
}
?>
<div class="container" id="content">
    <form action="index.php" method="post">
    <div class="form-group">
<label>Username</label>
<input class="form-control" type="text" name="username" required/>
    </div>
    <div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required/>
    </div>
    <button class="btn btn-primary float-right" name="login_user" type="submit">Sign In</button>
        <p>contact via whatsapp if you're a new customer:+96176856722</p>
</form>
</div>
<footer class="footer">© 2020 Copyright: Done By Web Avengers <i class="fa fa-heart"></i></footer>
</body>
</html>