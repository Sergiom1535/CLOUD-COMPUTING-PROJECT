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
        if (!$_POST)  {
            if (!isset($_GET["post_id"])) { 
                header("Location: home.php");
                exit;
            }
            $verify = "SELECT t.topic_id, t.topic_title FROM topics AS t LEFT JOIN posts AS p ON p.topic_id = t.topic_id WHERE p.post_id = ".$_GET['post_id'].""; 

            $verify_res = mysqli_query($dbc,$verify) or die(mysqli_error());
            if (mysqli_num_rows($verify_res) < 1) {
                header("Location: home.php");
                exit;
            } else {
                while($topic_info = mysqli_fetch_array($verify_res)){
                    $topic_id = $topic_info['topic_id'];
                    $topic_title = stripslashes($topic_info['topic_title']);
                }
               
                
                echo"
                <html>
                <head>
                <title>Post Your Reply in ".$topic_title."</title>
                </head>
                <body>
                <h1>Post Your Reply in $topic_title</h1>
                <form method=\"post\" action=\"".$_SERVER["PHP_SELF"]."\">
                <p><strong>Enter your Name::</strong><br>
                <input type=\"text\" name=\"post_owner\" size=\"40\"maxlength=\"150\"></p>
                <P><strong>Post Reply:</strong><br>
                <textarea name=\"dicsussion\" rows=\"8\" cols=\"40\"wrap=\"virtual\"></textarea>
                <input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\">
                <P><input type= \"submit\" name=\"submit\" value=\"Add Post\"></p>
                </form>
                </body>
                </html>";
            }mysqli_free_result($verify_res);
            mysqli_close($dbc);
        }else if ($_POST) { 
            if ((!$_POST['topic_id']) || (!$_POST['dicsussion']) || (!$_POST['post_owner'])) {
                header("Location: reply.php");
                exit;
            }
            $diss = $_REQUEST['dicsussion'];
            $name = $_REQUEST['post_owner'];
            $topic = $_REQUEST['topic_id'];
            $add_post = "INSERT INTO posts (topic_id,dicsussion,post_created_time,post_owner) VALUES('$topic', '$diss',NOW(),'$name')";
            $add_post_res = mysqli_query($dbc,$add_post) or die(mysqli_error());
            mysqli_close($dbc);
            header("Location: showdiscussion.php?topic_id=".$_POST["topic_id"]);
            exit;
        }

?>
</body>
</html> 
