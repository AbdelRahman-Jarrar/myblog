<?php
// include_once 'classes/Database2.php';
// include_once 'classes/Database.php';

            $servername = "localhost";
            $username = "root";
            $password = "qwer";

            $connection = new mysqli($servername, $username, $password);
            mysqli_select_db($connection, 'myblog');
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $results_per_page = 5;
            $sql2 = "SELECT * FROM posts ORDER BY ID DESC ";
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

            $sql = "SELECT * FROM posts ORDER BY ID DESC limit $this_page_first_result, $results_per_page" ;
            $result = $connection->query($sql) ;
            if (isset($_GET['id'])) {  
            $id = $_GET['id'];  
             $query = "DELETE FROM `posts` WHERE ID = '$id'";  
            if ($run) {  
                header('location:pagination.php');  
              }else{  
                 echo "Error: ".mysqli_error($connection);  
      }  
 }  
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="navbar4.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="ajax_pagination.js"></script>

    <title>Document</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="classes/navbar2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel='stylesheet' href='style.css' type='text/css' />
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
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <div class="dot"></div>
    </nav>



    <h1 >List of Post</h1><br>
    <a class='btn btn-secondary btn-sm' href='newupdate.php'>create new post</a><br><br>
    <a class='btn btn-secondary btn-sm' href='users.php'>users table</a>
    <a class='btn btn-secondary btn-sm' href='main.php'>main</a>


    <br>
    <div >
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

        <tbody class="table-ajax">
            <?php
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["ID"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["body"] . "</td>
                    <td>" . $row["user_id"] . "</td>

                    <td>
                        <a class='btn btn-secondary btn-sm' href='newupdate.php?id=". $row["ID"] ."'>Update</a>
                        <a class='btn btn-secondary btn-sm' href='pagination.php?id=". $row["ID"] ."'>Delete</a>
                    </td>
                </tr>";
            }

            ?>
        </tbody>
    </table>
</div>
    <footer>

<div class="container"> 
    <br>
    <?php
    $per_page = 5;

            $sql2 = "SELECT * FROM posts ORDER BY ID DESC ";
            $result2 = $connection->query($sql2);
            if ($result2=mysqli_query($connection,$sql2)) {
             $rowcount=mysqli_num_rows($result2);
                }
    $pages = ceil($rowcount/$per_page)
    ?>      
    <div id="content_container"></div>
    <div class="pagination">
        <ul id="paginate">
            <?php       
            for($i=1; $i<=$pages; $i++) {
                echo '<li id="'.$i.'">'.$i.'</li>';
            }
            ?>
        </ul>
    </div>
    
    <div style="margin:50px 0px 0px 0px;">
                                
    </div>  
    
</div>
     


</body>
</html>




  <script>  
 $(document).ready(function(){  

    console.log($("#page").val())

      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           $("#page").val(page);
                  $.ajax({  
                url:"pagination22.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('.table-ajax').html(data); 
                     $("#page").val(page)
                         if(page > 1){
                             $('.arrw').show();
                             $('.arrw').html( "<a id='"+(page-1)+"' class='pagination_link' class='   '>&laquo</a>");  

    } else{
         $('.arrw').hide();
    }




                }  
           })   
      });  
 });  
 </script>    