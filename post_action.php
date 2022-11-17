<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Discussion Forum</title>
<meta name="viewport" content="width=device.width, inital-scale=1">
<link rel="stylesheet" href="stylesheet.css">
<body>
<div class="header">
 	<h1>Discussion Forum</h1>
 	<p>Ask us what's on your mind</p>
	</div>
	<div class="navbar">
  		<nav class="links">
    		<a href="createdisc.php">Create a Discussion
    		</a>
   		 <a href="home.php">home
    		</a>
  		 </nav>
	</div>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('connect_db.php');
	$name = $_REQUEST['topic_owner'];
	$topic = $_REQUEST['topic_title'];
	$diss = $_REQUEST['discussion'];
	$q = "INSERT INTO topics(topic_owner,topic_title,topic_create_time)VALUES('$name','$topic',NOW())";
$r = mysqli_query($dbc,$q);
$topic_id = mysqli_insert_id($dbc);	
$p = "INSERT INTO posts(topic_id,dicsussion,post_owner,post_created_time)VALUES('$topic_id','$diss','$name',NOW())";
$s = mysqli_query($dbc,$p);
}
echo'<P>The topic has been created.</p>';
echo'<p><a href="home.php">home</a></p>';	
?>
</body>
</html> 
