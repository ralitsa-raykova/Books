<?php
    include('dbcon.php');
    $id=$_GET['id'];

    mysql_query("delete from books where BookID='$id'");
    header('location:member-index.php');

?>