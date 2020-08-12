<div class="post_body">
        <?php
    include('/Applications/XAMPP/xamppfiles/htdocs/student/includes/connect.php');
    $query = 'select * from posts order by rand() LIMIT 0,4';

    $run = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($run)){
        $post_id = $row['post_id'];
        $title   = $row['post_title'];
        $author  = $row['post_author'];
        $image   = $row['post_image'];
        $content = substr($row['post_content'],0,200);
    
    ?>
      
<div class="card">
<h2><a href="pages.php?id=<?php echo $post_id; ?>"><?php echo $title; ?></a>
</h2>
<h5><p> authored by: &nbsp;&nbsp;<?php echo $author; ?></p></h5>
<div class="fakeimg" ><img src="/student/images/<?php echo $image; ?>" width="100%" height="400px" /> </div>
<p><?php echo $content; ?></p>
<p><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>
</div>
      
      
      

 
 <?php }?>
 
 
 
 
</div>