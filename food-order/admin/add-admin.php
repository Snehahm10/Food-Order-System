<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1>Add Admin</h1>
    <br>
    <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
    <br><br>
    <form action="" method="Post">
        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter your name">
                </td>
            </tr>
            <tr>
                <td>Username</td>
            <td>
                <input type="text" name="username" placeholder="Enter your username">
            </td></tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Enter your password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>
<?php include('partials/footer.php');?>
<?php
if(isset($_POST['submit']))
{
    // get data from form
   $full_name =$_POST['full_name'];
    $username= $_POST['username'];
  $password=md5($_POST['password']);
   
//   sql query to save data into database
  $sql="INSERT INTO tbl_admin SET 
  full_name='$full_name',
  username='$username',
  password='$password'
  ";
//   executing query and saving data into db
$res=mysqli_query($conn,$sql) or die(mysqli_error());

// check whether the query is executed ie data is inserted or not and display appropriate message
if($res==True){
    $_SESSION['add']="<div class='success'>Admin Added Successfully</div>";
    header("location:".SITEURL.'admin/manage-admin.php');
}
else{
    $_SESSION['add']="<div class='error'>Failed to Add Admin</div>";
    header("location:".SITEURL.'admin/add-admin.php');
}

}

?>