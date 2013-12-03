<?php
    include('dbcon.php');

    if (isset($_POST['submit'])){

    $Title=$_POST['Title'];
    $Author=$_POST['Author'];
    $PublisherName=$_POST['PublisherName'];
    $CopyrightYear=$_POST['CopyrightYear'];



    mysql_query("insert into books (Title,Author,PublisherName,CopyrightYear)
			values('$Title','$Author','$PublisherName','$CopyrightYear')");
			header('location:member-index.php');
    }
?>