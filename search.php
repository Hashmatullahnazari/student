<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div><?php include('includes/headers.php');?></div>
<div><?php include('includes/nav.php');?></div>
<div><?php include('includes/sidebar.php');?></div>
<div><?php include('includes/footer.php');?></div>

<div class="post_body">

<?php
 include('includes/connect.php');
    
 if (isset($_GET['submit'])) 
 {
     
 $search_id = $_GET['search'];
     
$query = "select *  from posts where post_title like '%$search_id%'";
 
$run = mysqli_query($conn,$query);
     
 while($row=mysqli_fetch_array($run))
{
   $post_id =  $row['post_id'];
   $post_title =  $row['post_title'];
   $post_image =  $row['post_image'];
   $post_content =  substr($row['post_content'],0,100);
}
    
     ?>
    

<h2><a href="pages.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
</h2>
<div class="fakeimg" ><img src="/student/images/<?php echo $post_image; ?>" width="50%" height="300px" /> </div>
<p><?php echo $post_content; ?></p>
<p><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>


      
      
      

 
 <?php } ?>
    </div>


</body>
</html>