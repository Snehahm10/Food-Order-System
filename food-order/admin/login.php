<?php include('../config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Food Order Website</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <?php
        if(isset($_SESSION['Login']))
        {
            echo $_SESSION['Login'];
            unset($_SESSION['Login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br>
        <form action="" method="POST" >
            <table >
            <tr> <td>Username:</td>
            <td><input type="text" name="username" placeholder="Enter your name"></td></tr>
            <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Enter your password"></td> 
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Login" class="btn-secondary"></td>
            </tr>


            </table>
            


        </form>
        <p class="text-center">Created by <a href="www.snehahm.com">Sneha HM</a></p>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5($_POST['password']);

    $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        $_SESSION['Login']="<div class='success'>Login is successfull.</div>";
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'admin/');

    }
    else{
        $_SESSION['Login']="<div class='error' class='text-center'>Username and password did not match.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
}