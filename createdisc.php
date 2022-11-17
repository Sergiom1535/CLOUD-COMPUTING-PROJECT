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
	<div class="form">
		<form action="post_action.php" method="POST" accept-charset="utf-8">
			<label for="name">name:</label><br>
            		<input type="text" id="name" name="topic_owner"><br>
            		<label for="topic">topic:</label><br>
            		<input type="text" id="topic" name="topic_title"><br>
            		<label for="discussion">Discussion</lable><br>
            		<input class="textarea" type="text"  id="discussion" name="discussion" size="30" >
         
            		<input type="submit" value="Submit">

		</form>
	</div>
	
	
</body>
</html> 
