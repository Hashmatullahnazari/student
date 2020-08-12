<?php
include('includes/connect.php');

$delete_id = $_GET['del'];

$delete_query = "delete from posts where post_id='$delete_id'";

if(mysqli_query($conn,$delete_query)) {
    echo "<script>window.open('index.php?deleted= post has been deleted...','_self')</script>";

} 



?>