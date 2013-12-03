<?php
	require_once('auth.php');
?>
<?php ob_start(); ?>
<?php
include 'dbcon.php';
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Books</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME']. " ".$_SESSION['SESS_LAST_NAME'];?></h1>
<a href="member-profile.php">My Profile</a> | <a href="logout.php">Logout</a>
<h1><p>Edit book information. </p></h1>

</br></br>

<form method="post">
<table border class="imagetable" >
<?php $books_query=mysql_query("select * from books where BookID='$id'");
$books_rows=mysql_fetch_array($books_query);
?>
<tr><td> Title:  </td>
<td><input type="text" name="Title" size=50 value="<?php echo  $books_rows['Title'];  ?>"></td></tr>
<tr><td> Author: </td>
<td><input type="text" name="Author" size=50 value="<?php echo $books_rows['Author'];  ?>"></td></tr>
<tr><td> Publisher Name:</td>
<td><input type="text" name="PublisherName" size=50 value="<?php echo $books_rows['PublisherName'];  ?>"></td></tr>
<tr><td> Copyright Year:</td>
<td><input type="text" name="CopyrightYear" size=50 value="<?php echo $books_rows['CopyrightYear']; ?>" ></td></tr>
<tr><td></td><td><input type="submit" name="submit" title="Click here to save the record in the database"
 value="Save Record"></td></tr>
</table>
</form>

</body>
</html>
<?php 
if (isset($_POST['submit']))
{
$Title=$_POST['Title'];
$Author=$_POST['Author'];
$PublisherName=$_POST['PublisherName'];
$CopyrightYear=$_POST['CopyrightYear'];

mysql_query("update books set Title='$Title',Author='$Author',PublisherName='$PublisherName',CopyrightYear='$CopyrightYear' where BookID='$id'");
header('location:member-index.php');
}
?>
<?php ob_flush(); ?>
