  <?php
$servername = "localhost";
$database = "myblog";
$username = "root";
$password = "qwer";
 
 session_start();
$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {  
      $username=$_POST['username'];  
      $password=$_POST['password'];  
      if (empty($username) || empty($password)) {
         header("Location: http://localhost/phptest/login.php");    
         exit();
     }
      $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
      $row = mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result) > 0){
          if($password == $row["password"]){
               $_SESSION["login"] = true;
               $_SESSION["id"] = $row["id"];
                
          if ($row["role"] == "Admin") {
                      header('location: pagination.php');
               } 
          if ($row["role"] == "Author") {
                      header('location: post.php');
               }                
          }
           else{
           echo "<script>alert('wrong password') </script>";
                }
      }
  else{
      echo "<script>alert('wrong username') </script>";
  }
 } 

?> 
 
 

 <!DOCTYPE html>  
 <html>  
 <head>  

     <link rel="stylesheet" href="navbar4.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <meta charset="utf-8">  
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
                font-family: 'verdana', sans-serif;  
                -webkit-box-sizing: border-box;

               user-select: none;
               font-family: 'Poppins', sans-serif;
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
                color: #fff;  
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
           #error-username{
               margin: .5em 0 0 0;
               float: left;
               font-family: "Lucida Console", "Courier New", monospace;
               color: red ;
               font-size: 14px;

           }
            #error-password{
             margin: .5em 0 0 0;
             float: left;
             font-family: "Lucida Console", "Courier New", monospace;
             color: red ;
             font-size: 14px;

           }
           #alert{
               background: #ffdb9b;
               padding: 20px 40px;
               min-width: 420px;
               position: absolute;
               right: 0;
               top: 10px;
               border-radius: 4px;
               border-left: 8px solid #ffa502;
               overflow: hidden;
               opacity: 0;
               pointer-events: none;
          }
          #alert.showAlert{
               opacity: 1;
               pointer-events: auto;
          }
          #alert.show{
               animation: show_slide 1s ease forwards;
          }


      </style>  
      <script src="js/validation.js"></script>
 </head>  
 <body>  

    <nav class="navMenu">
      <a href="logout.php">logout</a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <div class="dot"></div>
    </nav>
  
 <div class="container"  >  
      <h1>Login</h1> 
      <form id="from-login"  method="post" action="" onsubmit="validateFun()">  
     <input type="text" name="username" placeholder="User name" class="data-insert" id="username"  value="">  
             <div id="error-username" class="popup"></div> 

           <input type="password" name="password" placeholder="Password" class="data-insert" id="password" value="">  
        <div id="error-password"></div> 

           <input type="submit" name="submit" class="sub_btn" value="submit" >
          <br><br>
    <a class='btn btn-secondary btn-sm sub_btn' href='Registration.php'>Registration</a><br><br>
           <br>  
      </form>  
 </div>  


 
 </body>  
 </html>