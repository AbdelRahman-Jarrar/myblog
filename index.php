<?php 
include("db_connect.php");
?>
<html>
<title>jarrar</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="ajax_pagination.js"></script>
<link rel='stylesheet' href='style.css' type='text/css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="classes/navbar2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<body style="margin: 50px; background-color:#808B96;" >
<?php include('container.php');?>
    <h1 >List of Post</h1><br>
    <a class='btn btn-secondary btn-sm' href='newupdate.php'>create new post</a><br><br>
    <a class='btn btn-secondary btn-sm' href='users.php'>users table</a>
<div class="container">	
    <br>
	<?php
	$per_page = 5;
	$sql = "SELECT * FROM `posts`";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	$pages = ceil($count/$per_page);
	$page = 01;
	$start_from=($page-1)*05;
	?>		
	<div class="navMenu" id="content_container"></div>
	<div class="pagination">
		<ul id="paginate">
			<?php
            if($page >= 1){
              echo "<li id=".($page-1)."' >&laquo</li>";
                }

			for($i=1; $i<=$pages; $i++)	{
				echo '<li id="'.$i.'">'.$i.'</li>';
			}
            if($i>$page){
              echo "<li id=".($page+1)."' >&raquo</li>";
                }

			?>

		</ul>
	</div>
	
	
	
</div>
</body>
</html>