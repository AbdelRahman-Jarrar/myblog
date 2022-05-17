<?php
include("db_connect.php");
$per_page = 5;
if(isset($_GET['page'])) {
	$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$sql_query = "select * FROM `posts` order by id limit $start,$per_page";
$resultset = mysqli_query($conn, $sql_query);
?>
<table width="100%" class="navMenu">
	<thead>
		<tr>
		<th>&nbsp;&nbsp;&nbsp;Id</th>
		<th>title</th>
		<th>body</th>
		<th>user_id</th>
		<th>Action<th>
		</tr>
	</thead>
	<?php
		while($rows = mysqli_fetch_array($resultset)){	?>	
			<tr  class="navMenu">
			<td>&nbsp;&nbsp;&nbsp;<?php echo $rows['ID']; ?></td>
			<td><?php echo $rows['title']; ?></td>
			<td><?php echo $rows['body']; ?></td>
			<td><?php echo $rows['user_id']; ?></td>


				       <td>
                        <a class='btn btn-secondary btn-sm' href='newupdate.php?id=". $row["ID"] ."'>Update</a>
                        <a class='btn btn-secondary btn-sm' href='pagination.php?id=". $row["ID"] ."'>Delete</a>
                    </td>

			</tr>


	<?php }	?>
</table>