<?php
include_once 'classes/Database2.php';
include_once 'classes/Database.php';

            $servername = "localhost";
            $username = "root";
            $password = "qwer";

            $connection = new mysqli($servername, $username, $password);
            mysqli_select_db($connection, 'myblog');
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $results_per_page = 5;
            $sql2 = "SELECT * FROM `users` ORDER BY ID DESC ";
            $result2 = $connection->query($sql2);
            if ($result2=mysqli_query($connection,$sql2)) {
             $rowcount=mysqli_num_rows($result2);
                }
            



            
            $number_of_pages =ceil( $rowcount/$results_per_page);

             if (!isset($_GET['page'])) {
                 $page = 1; 

             }else {
                $page = $_GET['page'];
                }

            $this_page_first_result = ($page-1)*$results_per_page  ;

            $sql = "SELECT * FROM users ORDER BY ID DESC limit $this_page_first_result, $results_per_page" ;
            $result = $connection->query($sql) ;
            if (isset($_GET['id'])) {  
            $id = $_GET['id'];  
             $query = "DELETE FROM `users` WHERE ID = '$id'";  
            $run = mysqli_query($connection,$query);  
            if ($run) {  
                header('location:users.php');  
              }else{  
                 echo "Error: ".mysqli_error($connection);  
      }  
 }  
   ?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
.right{
  text-align: center;

}
.hh{
  color: white;
  border-radius: 5px;

}
</style>


</head>
<body style="margin: 50px; background-color:#808B96;"     >
    <?php include('container.php');?>
<div class="container"> 
    <div class="navMenu" id="content_container"></div>

    <h1 class="hh">List of Users</h1><br>
    <a class='btn btn-secondary btn-sm' href='insertUser.php'>create new user</a><br><br>


    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User name</th>
                <th>role</th>
                <th>email</th>
		    <th>action</th>
		    <th>	
            </tr>
        </thead>

        <tbody>
            <?php
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["role"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href='insertUser.php?id=". $row["id"] ."'>Update</a>
                        <a class='btn btn-secondary btn-sm' href='users.php?id=". $row["id"] ."'>Delete</a>
                        <a class='btn btn-secondary btn-sm' href='userpost.php?id=". $row["id"] ."'>create</a>
                        <a class='btn btn-secondary btn-sm' href='post.php?id=". $row["id"] ."'>post</a>

                    </td>
                </tr>";
            }

            ?>
        </tbody>
    </table>
</div>
    <footer>
<?php
        echo" <div class='pagination'>";

                if($page>1)
                {
                    echo "<a href='users.php?page=".($page-1)."' class='   '>&laquo</a>";
                }

                for($i=1;$i<=$number_of_pages;$i++)
                {
                    echo "<a href='users.php?page=".$i."' class='' ".(($page == $i) ? 'style="color:#ECF0F1;"':'').">$i</a>";
                }
                if( ($i - 1) > $page )
                {

                    echo "<a href='users.php?page=".($page+1)."' class=''>&raquo</a>";
                }
                // if($i >$page){
                //     header("users.php?page=");
                // }

echo"</div>";
                
        
     
?>

</body>
</html>




