<?php   
// include_once 'classes/Database2.php';
//         $msg="";  
//         $title="";  
//         $body="";  


// if (isset($_POST['submit'])) {  
 
//       $title=$_POST['title'];  
//       $body=$_POST['body'];  
//           if (empty($title) || empty($body)) {
//           header("Location: http://localhost/phptest/pagination.php?Add=failed");
//           exit();
//      }else{
//                     header("Location: http://localhost/phptest/pagination.php?Add=success");
//      }    
//       if (isset($_GET['id'])) {  
//            $update=mysqli_query($conn,"UPDATE posts SET title = '$title', body= '$body' WHERE ID = '$id'");  
//            if ($update) {  
//                 header("location:pagination.php");  
//                 die();  
//            }  
//       }else{  
//            $insert=mysqli_query($conn,"INSERT INTO `posts`(`title`, `body`)  VALUES ('$title','$body')");  
//            if ($insert) {  
//                 $msg="Data inserted successfully";  
//                 header("location:pagination.php");  

//            }else{  
//                 $msg="Something Error, Try after sometime !";  
//            }  
//       }  
//  }  

 ?>   
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">

         <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
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
 <div class="container"  > 
 
      <h1>Posts Insert</h1>  
      <form id="myForm" action="" method="post">   
          <input type="text" name="title" required value="" class="data-insert" placeholder="title"> 
          <input type="text" name="body" required value="" class="data-insert" placeholder="body">
  
           <br>
          
          <button type="submit" name="button" class="sub_btn" onclick = "insert();">Submit</button>
          <br><br><br>
          <a class="sub_btn" href='pagination.php'>back</a>

           <br>  
      </form>  
 </div>  
 

 </body>
     <script type="text/javascript">
      var form = document.getElementById("myForm");
      function handleForm(event) { event.preventDefault(); }
      form.addEventListener('submit', handleForm);
      function insert(){
        $(document).ready(function(){

          $.ajax({
            url: 'function.php',
            type: 'POST',
            data: {
              title: $("input[name=title]").val(),
              body: $("input[name=body]").val(),

              action: "insert"
            },
            success:function(response){
              if(response == 1){
                alert("Data Added Successfully!");
              }


              else{
                alert("Data not Added Successfully!");

              }
            }
          });
        });
      }
    </script>  
 </html>