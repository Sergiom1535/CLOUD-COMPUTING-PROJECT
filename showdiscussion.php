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

if (!isset($_GET["topic_id"])) {
    header("Location: home.php");
    exit;
}

require('connect_db.php');
$verify_topic = "select topic_title from topics where  topic_id = ".$_GET["topic_id"]."";
$verify_topic_res = mysqli_query($dbc,$verify_topic)or die(mysqli_error());

if (mysqli_num_rows($verify_topic_res) < 1) {

   echo'<P><em>You have selected an invalid topic.Please <a href=\"home.php\">try again</a>.</em></p>';
}else{
    while ($topic_info = mysqli_fetch_array($verify_topic_res)) {
        $topic_title = stripslashes($topic_info["topic_title"]);
    } 

    $get_post = "SELECT post_id, post_created_time, post_owner,dicsussion FROM posts WHERE topic_id= ".$_GET['topic_id']." order by post_created_time asc";
    $get_posts_res = mysqli_query($dbc,$get_post) or die(mysqli_error());

}

while($posts_info =mysqli_fetch_array($get_posts_res,MYSQLI_ASSOC)){
    $post_id = $posts_info['post_id'];
    $post_text = nl2br(stripslashes($posts_info['dicsussion']));
    $post_create_time = $posts_info['post_created_time'];
    $post_owner = stripslashes($posts_info['post_owner']);
    echo'<table >
    <tr>
    <th>AUTHOR</th>
    <th>POST</th>
    </tr>

    <tr><td>'.$post_owner.'<br>['.$post_create_time.']</td>
    
    <td>'.$post_text.'<br><a href="reply.php?post_id='.$post_id.'">Reply</a></td>

    </tr>';


}
mysqli_close($dbc);
?>
</body>
</html> 