<?php   
include_once 'classes/Database2.php';
 $msg="";  
 $title="";  
 $body="";  
 if (isset($_GET['id'])) {  
      $id=$_GET['id'];  
      $select=mysqli_query($conn,"select * from posts where id='$id'");  
      $data=mysqli_fetch_assoc($select);  
      $title=$data['title'];  
      $body=$data['body'];  
 }  
 if (isset($_POST['submit'])) {  
 
      $title=$_POST['title'];  
      $body=$_POST['body'];  
          if (empty($title) || empty($body)) {
          header("Location: http://localhost/phptest/pagination.php?Add=failed");
          exit();
     }else{
                    header("Location: http://localhost/phptest/pagination.php?Add=success");
     }    
      if (isset($_GET['id'])) {  
           $update=mysqli_query($conn,"UPDATE posts SET title = '$title', body= '$body' WHERE ID = '$id'");  
           if ($update) {  
                header("location:pagination.php");  
                die();  
           }  
      }else{  
           $insert=mysqli_query($conn,"INSERT INTO `posts`(`title`, `body`)  VALUES ('$title','$body')");  
           if ($insert) {  
                $msg="Data inserted successfully";  
                header("location:pagination.php");  

           }else{  
                $msg="Something Error, Try after sometime !";  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
                font-family: 'verdana', sans-serif;  
           }  
           body{  
                width: 100%;  
                height: 100vh;  
                display: flex;  
                justify-content: center;  
                align-items: center;  
                background-color: #FFFFFF;  
           }  
           .container{  
                max-width: 500px;  
                width: 100%;  
                background-color: #ffff;  
           }  
           .container form{  
                width: 100%;  
                padding: 30px;  
           }  
           .container form .data-insert{  
                width: 100%;  
                padding: 12px 10px;  
                outline: none;  
                border: 1px solid #111;  
                margin: 8px 0px  
           }  
           .container form .sub_btn{  
                width: 100%;  
                padding: 10px 30px;  
                background-color: green;  
                color: #ffff;  
                font-size: 1em;  
                outline: none;  
                border: 0;  
                cursor: pointer;  
           }  
           .container h1{  
                display: block;  
                text-align: center;  
                padding: 15px 0px;  
           }  
      </style>  
 </head>  
 <body>  
 <div class="container">  
      <h1>Posts Insert</h1>  
      <form method="post" action="">  
           <input type="text" name="title" placeholder="Title" class="data-insert" value="<?php echo $title; ?>">  
           <input type="text" name="body" placeholder="Body" class="data-insert" value="<?php echo $body; ?>">  
  
           <input type="submit" name="submit" class="sub_btn" value="Submit" >  
           <br>  
           <span><?php echo $msg; ?></span>  
      </form>  
 </div>  
 </body>  
 </html>