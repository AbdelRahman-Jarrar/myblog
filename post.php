<?php
include_once 'classes/data.php';
include_once 'classes/Database.php';



            if(!empty($_SESSION["id"])){
                  $id = $_SESSION["id"];

            $sql2 = "SELECT * FROM posts WHERE user_id = $id";
            $result2 = $connection->query($sql2);
            }
                else{
                        header("Location: login.php");
                    }

   ?>


<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="navbar4.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.pagination {
  display: inline-block;
  padding: 70px 0;
  text-align: center;

}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
</style>


</head>
<body style="margin: 50px; background-color:#808B96;"     >

        <nav class="navMenu">
      <a href="logout.php">logout</a>
      <a href="#">Blog</a>
      <a href="#">Work</a>
      <a href="#">About</a>
      <div class="dot"></div>
    </nav>
  
    <h1 >List of Post</h1><br>
    <a class='btn btn-success btn-sm' href='newupdate.php'>create new post</a><br><br>
    <a class='btn btn-success btn-sm' href='users.php'>users table</a>


    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>User_id</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            
            while($row = $result2->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["ID"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["body"] . "</td>
                    <td>" . $row["user_id"] . "</td>

                    <td>
                        <a class='btn btn-primary btn-sm' href='newupdate.php?id=". $row["ID"] ."'>Update</a>
                        <a class='btn btn-danger btn-sm' href='pagination.php?id=". $row["ID"] ."'>Delete</a>
                    </td>
                </tr>";
            }

            ?>
        </tbody>
    </table>
    <footer>

     


</body>
</html>

