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
    $page_id = $_GET['id'];
    
    $query = "select * from posts where post_id='$page_id'" ;
    $run = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($run)){
       
        $title   = $row['post_title'];
        $author  = $row['post_author'];
        $image   = $row['post_image'];
        $content = $row['post_content'];
    }
    ?>
<div class="container">
      <h2><?php echo $title; ?></h2>
      <h5><p> authored by: &nbsp;&nbsp;<?php echo $author; ?></p></h5>
      <div><a href="pages.php?id=<?php echo $post_id; ?>"><img src="/student/images/<?php echo $image; ?>" width="100%"/></a> </div>
      <p><?php echo $content; ?></p>

    </div>
            
                 
</div>
</body>
</html>