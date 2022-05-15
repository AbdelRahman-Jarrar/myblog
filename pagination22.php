 <?php  
 $connect = mysqli_connect("localhost", "root", "qwer", "myblog");  
 $record_per_page = 5;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM posts ORDER BY ID DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= "<tr>
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
 $page_query = "SELECT * FROM posts ORDER BY student_id DESC";  
 $page_result = mysqli_query($connect, $page_query);  
        $results_per_page = 5;
            $sql2 = "SELECT * FROM posts ORDER BY ID DESC ";
            $result2 = $connect->query($sql2);
            if ($result2=mysqli_query($connect,$sql2)) {
             $rowcount=mysqli_num_rows($result2);
                }
 $output .= '</div>';  


 // $total_pages = ceil($rowcount/$record_per_page);  
 // for($i=1; $i<=$total_pages; $i++)  
 // {  
 //      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 // }  
 echo $output;  
 ?> 