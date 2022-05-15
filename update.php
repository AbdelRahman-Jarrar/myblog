<?php 
require 'classes/Database.php';

$database = new Database;
$error = [];
$post = $_POST;
if (!empty($_GET['delete_id'])) {
	$delete_id= $_GET['delete_id'];
	$database->query('DELETE FROM posts WHERE ID = :id');
	$database->bind(':id', $delete_id);
	$database->execute();
}

if(!empty($post['Add'])){
	$title = $post['title'];
	
	$id = $post['id'];
	$body = $post['body'];
			$database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
			$database->bind(':title', $title);
			$database->bind(':body', $body);
			$database->execute();

}
 
if(!empty($post['Update'])){
	$title = $post['title'];
	if(empty($title))
		$error['title-error'] = "please add title";

	$id = $_GET['id'];
	$body = $post['body'];
	if(empty($error)){

	$database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->bind(':id', $id);
	$database->execute();
		}



}

$database->query('SELECT * FROM posts');
$rows = $database->resultset();
?>



<html>

<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
body {
  font-family: 'Courier New', monospace;
}
</style>
<head>
	<link rel="stylesheet" href="classes/navbar.css">
</head>
<header class="header">
			<h1 class="logo"><a href="#">facebook</a></h1>
      <ul class="main-nav">
          <li><a href="http://localhost/phptest/pagination.php?Add=success">Home</a></li>

          <li><a href="#">About</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Contact</a></li>
      </ul>
</header>
<body>
<br> <br>
<img src="download.PNG" class="center">

<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">	        
    		<h1>Create post</h1>	
    		<form form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">    
    		    <div class="form-group">
    		        <label for="title">Title </label>
    		        <input required type="text" id="dsdsd" name="title" placeholder="Add a Title..."  class="form-control"   />
    		        	    <label style="color:red;"><?=$error['title-error']??''?></label>
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea name="body"class="form-control" rows="5" id="comment"   ></textarea>
    		    </div>
    		    
    		    <div class="form-group">
    		      		 <div  action="http://localhost/phptest/table.php">
    		      		    <form class="form-group" >
														<input href="http://localhost/phptest/pagination.php?Add=success" input type="submit" name="Update" value="Create" class="btn btn-outline-success btn btn-primary">Create</input>
											</form>
										</div>	

    		     </div>

    		    
    		</form>
		
	





</body>
</html>