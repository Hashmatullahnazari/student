<?php
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");
}
else {
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="insert_post.php"  enctype="multipart/form-data">
<table align="" colspan="5"  border="10" width="600">

    <tr>  
    <td align="center" colspan="5"><h1>Insert New Post Here</h1></td>
    </tr>
    <tr>
    <td> post Title:</td>
    <td><input type="text" name="title" size="40"></td>
    </tr>

    <tr>
    <td>post Author:</td>
    <td><input type="text" name="author"></td>
    </tr>
    <tr>
    <td>post Image:</td>
    <td><input type="file" name="image"></td>
    </tr>
    <tr>
    <td align="">post Content:</td>
    <td><textarea name="content" cols="30" rows="20"></textarea></td>
    </tr>
    <tr>
    <td align="center" colspan="5"><input type="submit" name="submit" value="Publish Now"></td>

</tr>



</table>

<?php
include("includes/connect.php");
    if(isset($_POST['submit'])) {
    $title      = $_POST['title'];
    $author     = $_POST['author'];
    $content    = $_POST['content'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size  = $_FILES['image']['size'];
    $image_tmp  = $_FILES['image']['tmp_name'];

if($title=='' or $author=='' or $content==''){
    echo "<script>alert('fill the empty fields')</script>";
    exit();
}
if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif"){
if($image_size <= 2000000)
{
    move_uploaded_file($image_tmp,"images/$image_name");
}
else
{
    echo "<script>alert('image is larger then 10m')</script>";
}
}
else
{
    echo "<script>alert('image type is invalid')</script>";

}




$query = "insert into posts (post_title, post_author, post_image, post_content) values('$title', '$author', '$image_name', '$content')";



if(mysqli_query($conn,$query))
{
    echo "<script>window.open('index.php?published=post has been published',_self)</script>";

} 


?>


</form>

</body>
</html>


<?php } }?>




