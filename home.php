<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Discussion Forum</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
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
<div class="_search">
    <form>
        <label for="search">Forum Search:</label>
        <input type="search" id="search" name="search">
      </form> 
</div>
<style>
table {
    margin: 20px;
}

th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
    background: #666;
    color: #FFF;
    padding: 5px 10px;
    border-collapse: separate;
    border: 1px solid #000;
}

td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1em;
    width:680px;	
    border: 5px solid #DDD;
}
</style>
<?php
	require('connect_db.php');
	$q = "SELECT * FROM topics";
	$r = mysqli_query($dbc,$q);
	if(mysqli_num_rows($r)>0)
	{	
		echo'<table><tr><th>Posted By</th><th>Topic</th></tr>';
		while($row =mysqli_fetch_array($r,MYSQLI_ASSOC))
{
   
echo'<tr><td>'.$row['topic_owner'].'<br>'.$row['topic_create_time'].'</td>
	<td><a href="showdiscussion.php?topic_id='.$row['topic_id'].'">'.$row['topic_title'].'</a><br></td>
	
</tr>';}echo'</table>';
		}else{
	echo'<p>There are no posts</p>';}
mysqli_close($dbc);
?>
</body>
</html> 