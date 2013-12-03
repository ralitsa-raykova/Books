<?php
	require_once('auth.php');
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

<br>

<?php
include('dbcon.php');
?>

<h1><center>Book Information System</center></h1>
<br><br>
<form method="post" action="add-book.php">
<table  border CLASS="imagetable" >
<tr><td>Title: </td>
<td><input type="text" name="Title" size=50></td></tr>
<tr><td> Author:</td>
<td><input type="text" name="Author" size=50></td></tr>
<tr><td>Publisher Name:</td>
<td><input type="text" name="PublisherName" size=50></td></tr>
<tr><td>Copyright Year:</td>
<td><input type="text" name="CopyrightYear" size=50></td></tr>
<tr><td></td>
<td><input type="submit" name="submit" value="Add Record"
 title="Click here to add record in the database." size=50></td></tr>
</table>
</form>

</br>
</br>
<table class="imagetable">
<?php
$books_query=mysql_query("select * from books");
while($books_rows=mysql_fetch_array($books_query)){
?>
<tr>
<td><?php echo $books_rows['BookID'] ; ?></td>
<td><?php echo $books_rows['Title'] ; ?></td>
<td><?php echo $books_rows['Author'] ; ?></td>
<td><?php echo $books_rows['PublisherName'] ; ?></td>
<td><?php echo $books_rows['CopyrightYear'] ; ?></td>

<td> <a href="javascript:confirmation(<?php echo $books_rows['BookID'] .",'{$books_rows['Title']}'"; ?>)">Delete Record</a>
</td>
<script type="text/javascript">

function confirmation(ID,TITLE) {
	var answer = confirm("Delete book entry "+TITLE+"?")
	if (answer){
		alert("Record has been erased.")
		window.location = "delete-book.php?act=trackdelete&id="+ID;
	}
	else{
		alert("No action taken")
	}
}

</script>
<td><a href="edit-book.php<?php echo '?id='.$books_rows['BookID']; ?> ">Update Record</a></td>
</tr>
<?php }?>
</table>

</body>
</html>
