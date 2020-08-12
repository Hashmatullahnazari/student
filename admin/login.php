<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="post">
<table align="center" colspan="5"  border="10" width="600">
 
   <tr>  
   <td align="center" colspan="5"><h1>Admin Login</h1></td>
  </tr>
  <tr>
   <td align="center"> user name:</td>
   <td><input type="text" name="user_name"></td>
  </tr>
  
  <tr>
   <td align="center">user password:</td>
    <td><input type="password" name="user_pass"></td>
  </tr>

   
   <tr>
    <td align="center" colspan="5"><input type="submit" name="login" value="Login"></td>
   
  </tr>
 

  
</table>

</form>

</body>
</html>

<?php
include('includes/connect.php');

    if(isset($_POST['login'])){
    $user_name = mysqli_real_escape_string ($conn,$_POST['user_name']);
    $user_pass = mysqli_real_escape_string ($conn,$_POST['user_pass']);
    
    $login_query = "select * from admin_login where user_name='$user_name' AND user_password='$user_pass'";
    
    $run = mysqli_query($conn,$login_query);
    
    if(mysqli_num_rows($run)>0) 
    {
        
        $_SESSION['user_name']=$user_name;
        echo "<script>window.open('index.php','_self')</script>";
    }
    
    else
    {
                echo "<script>alert('user name or password id incorrect')</script>";
    }

}


?>
