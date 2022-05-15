

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



$database->query('SELECT * FROM posts ORDER BY ID DESC limit 0,5');
$rows = $database->resultset();
?>
<html>
 <head>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
      <style>
.container {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}

.table-image {
  td, th {
    vertical-align: middle;
  }
}



img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.button.block {
    display: block;
    width: 200px;    
}

.margin-auto {
    margin: 0 auto;
}
</style>

 </head>

<body>

    <img src="download.PNG"  class="center">
<div style="text-align:center">
    <form method="GET" action="Add.php">
        <input type="hidden"  class="center" >
        <input type="submit"   class="center btn btn-primary"  value="Add" />

         <?Php 
              if (strpos($_GET['Add'], 'failed') !== false  ) {
            echo 'error please fill the fields';
            }else {

            }
            // echo $con;

          ?>

    </form>
</div>
  <br /><br /><br /><br /><br />
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Post</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
         <?php foreach($rows as $row) : ?>

        <tbody>
          <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['body']; ?></td>
            <td>
        <form method="GET" action="update.php">
              <input type="hidden" name="id" value="<?= $row['ID'] ?>">
              <input type="submit" class="btn btn-primary" value="Update"  />     
        </form>
        <form method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
              <input type="hidden" name="delete_id" value="<?= $row['ID'] ?>">
            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
              <input type="submit" name="delete"class="btn btn-primary"  value="Delete" />
        
        </form>
            </td>
          </tr>
        
        </tbody>
        <?php endforeach; ?>

      </table>
    </div>
  </div>
</div>



<?php

    $servername = "localhost";
    $database = "myblog";
    $username = "root";
    $password = "qwer";


    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT * FROM posts; "; 
    $result_per_page = 5;
    $result = mysqli_query( $conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    // if ($resultCheck > 0){
    //     while ($row = mysqli_fetch_assoc($result)) {
    //          echo ' '.$row['ID']."<br>";
       
    //    }
    // }

    echo ceil( $number_of_pages= $resultCheck/ $result_per_page) . '<br>';

    if (!isset($_GET['page'])) {

      $page = 1; 

    }else {
      $page = $_GET['page'];
    }
 echo $page .
    echo $this_page_first_result = ($page-1)*$result_per_page . '<br>' ;


    for ($page=1; $page <= $number_of_pages ; $page++) { 
      echo '<a href="table.php?Add=success? page=' . $page .'">'. $page .'</a>';
    }
   ?>





</body>
</html>









