    <?php
    session_start();

    if(!isset($_SESSION['user_name']))
    {

        header("location: login.php");
    }

    else {

    ?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <div class="header">
    <h1><a href="index.php">Welcome to Admin Panel</a></h1>
    </div>



    <div class="row">

    <div class="column side">
    <div class="topnav">
        <h2 style="color:white;" align="center"><?php echo $_SESSION['user_name']; ?></h2>
        <a href="logout.php">Admin Logout</a>
        <a href="index.php?view=view">View Posts</a>
        <a href="index.php?insert=insert">Insert New Posts</a>
    </div>
    </div>



    <div class="column middle">
    <h1 align='center'><?php echo @$_GET['deleted']; ?></h1>

    <?php
    include("includes/connect.php");

    if(isset($_GET['insert']))
    {
        include('insert_post.php');
    } 

    ?>

    <?php if(isset($_GET['view'])){ ?>

    <table width="600" align="center" border="3">
    <tr>
        <td align="center" colspan="9" bgcolor="orange">
        <h1>View All Posts</h1></td>
    </tr>

     <tr>
        <th>Post no</th>
        <th>Post Title</th>
        <th>Post author</th>
        <th>Post image</th>
        <th>Post content</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

    include("includes/connect.php");
        
    $i=1;
    if(isset($_GET['view'])) {

    $query = "select * from posts order by 1 DESC";

    $run = mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($run))
    {

        $id     =   $row['post_id'];
        $title  =   $row['post_title'];
        $author =   $row['post_author'];
        $image  =   $row['post_image'];
        $content = substr($row['post_content'],0,50);

    ?>

    <tr align="center">
        <td><?php echo $i++;?></td>
        <td><?php echo $title;?></td>
        <td><?php echo $author;?></td>
        <td><img src="../images/<?php echo $image; ?>" width="50" height="50"></td>
        <td><?php echo $content;?></td>
        <td><a href="edit.php?edit=<?php echo $id; ?>">Edit</a></td>
        <td><a href="delete.php?del=<?php echo $id; ?>">Delete</a></td>
    </tr>

    <?php }}} ?>
    </table>


    </div>

    <div class="column side">
        <h2>Side</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
    </div>
    </div>
    </body>
    </html>
    <?php } ?>

