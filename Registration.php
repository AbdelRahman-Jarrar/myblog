<?php   
include_once 'classes/Database2.php';
        $msg="";  
        $username="";  
        $email="";
        $role="";
        $password="";  
 if (isset($_GET['id'])) {  
      $id=$_GET['id'];  
      $select=mysqli_query($conn,"select * from users where id='$id'");  
      $data=mysqli_fetch_assoc($select);  
      $username=$data['username'];  
      $email=$data['email'];
      $role=$data['role'];
      $password=$data['password'];  
 }  

if (isset($_POST['submit'])) {  
 
      $username=$_POST['username'];  
      $email=$_POST['email'];
      $role=$_POST['role'];
      $password=$_POST['password'];
          if (empty($username) || empty($email) || empty($role)|| empty('password')) {
          header("Location: http://localhost/phptest/users.php?Add=failed");
          exit();
     }else{
                    header("Location: http://localhost/phptest/users.php?Add=success");
     }    
      if (isset($_GET['id'])) {  
           $update=mysqli_query($conn,"UPDATE users SET username = '$username', email= '$email' ,role= '$role' ,password= '$password' WHERE id = '$id'");  
           if ($update) {  
                header("location:users.php");  
                die();  
           }  
      }else{  
           $insert=mysqli_query($conn,"INSERT INTO `users` (`username`,`email`,`password`,`role`) VALUES ('$username','$email','$password','$role')");  
           if ($insert) {  
                $msg="Data inserted successfully";  
                header("location:users.php");  

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
                background-color: #808B96;  
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
                background-color: black;  
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
      <h1>New/Update User</h1>  
      <form method="post" action="">  
     <input type="text" id="username"> name="username" placeholder="User name" class="data-insert" value="<?php echo $username;?>">  
           <input type="text" id="email"> name="email" placeholder="email" class="data-insert" value="<?php echo $email; ?>">
             <select name="role" class="data-insert" role="$role">
                    <option value="Author">Author</option> 
           <input type="password" id="password"> name="password" placeholder="********" class="data-insert" value="<?php echo $password;?>">   
  
           <input type="submit" name="submit" class="sub_btn" value="Submit" >  
           <br>  
      </form>  
 </div>  
 </body>  
 </html>