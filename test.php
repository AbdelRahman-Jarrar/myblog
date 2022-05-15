<?php 
require 'classes/Database.php';

$database = new Database;

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
	$id = $post['id'];
	$body = $post['body'];

	$database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->bind(':id', $id);
	$database->execute();


}

$database->query('SELECT * FROM posts');
$rows = $database->resultset();
?>
<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<h1>Add Post</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<label>what id?</label><br />
	<input type="text" name="id" placeholder="please put the wanted id" /><br /><br />
	<label>Post Title</label><br />
	<input type="text" id="dsdsd" name="title" placeholder="Add a Title..." /><br /><br />
	<label>Post Body</label><br />
	<textarea name="body"></textarea><br /><br />
	<input type="submit" name="Add" value="Add" />
	<input type="submit" name="Update" value="Update" />
</form>

<h1>Posts</h1>
<div>
<?php foreach($rows as $row) : ?>
	<div class="container mt-3">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="good.JPG" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['title']; ?></h4>
      <p class="card-text"><?php echo $row['body']; ?></p>
		<form method="GET" action="update.php">
		<input type="hidden" name="id" value="<?= $row['ID'] ?>">
			<input type="submit" class="btn btn-primary" value="Update"  />			
		</form>
		<form method="GET" action="delete.php">
		<input type="hidden" name="delete_id" value="<?= $row['ID'] ?>">
			<input type="submit" name="delete"class="btn btn-primary"  value="Delete" />

		</form>

	</div>
  </div>
	<div>
		<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $row['body']; ?></p><br />
		<form method="GET" action="delete.php"">
		<input type="hidden" name="delete_id" value="<?= $row['ID'] ?>">
			<input type="submit" name="delete"class="btn btn-primary"  value="Delete" />

		</form>
		<form method="GET" action="update.php">
		<input type="hidden" name="id" value="<?= $row['ID'] ?>">
			<input type="submit" class="btn btn-primary" value="Update"  />

		</form>
	</div>
<?php endforeach; ?>
</div>


