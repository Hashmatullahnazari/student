<div class="sidebar">
  <h2>recent post</h2>
  <?php
    include('includes/connect.php');
    $query = 'select * from posts order by 1 DESC LIMIT 0,5';
    $run = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($run)){
        $post_id  = $row['post_id'];
        $title   = $row['post_title'];
        $image   = $row['post_image'];
        
    
    
    
  ?>
   
    <div class="card">
   <a href="pages.php?id=<?php echo $post_id; ?>"><img src= "/student/images/<?php echo $image; ?>"  width="100%"> </a>
    <a href="pages.php?id=<?php echo $post_id; ?>"><h2><?php echo $title; ?></h2></a>
   </div>
<?php }  ?>

</div>