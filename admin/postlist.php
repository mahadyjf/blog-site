<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>Post List</h2>
				<?php 
					if (isset($_GET['delid'])) {
					$delid=$_GET['delid'];
					$query1 = "SELECT * FROM tb_post WHERE id='$delid'";
					$get = $db->select($query1);
					if($get){
						while($delimg = $get->fetch_assoc()){
							$dellink = $delimg['image'];
							unlink($dellink);
						}
					}
					$query = "DELETE FROM tb_post WHERE id = '$delid'";
					$delete = $db->delete($query);
					if ($delete) {
						echo "<span class='success'>Post Deleted Succesfully</span>";
					  }else{
						echo "<span class='error'>Post Not Deleted !</span>";
					  }
					}
				?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">NO.</th>
							<th width="15%">Post Title</th>
							<th width="20%">Description</th>
							<th width="5%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="15%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT tb_post.*, tb_category.name FROM tb_post INNER JOIN tb_category
						ON tb_post.cat = tb_category.id
						ORDER BY tb_post.id DESC";
						$result = $db->select($sql);
						if ($result) {
							$i =0;
							while($row = $result->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $fm->textShorten($row['body'], 50); ?></td>
							<td><?php echo $row['name']; ?></td>
							<td> <img src="<?php echo $row['image']; ?>" height="60px" width="60px" alt=""></td>
							<td><?php echo $row['author']; ?></td>
							<td><?php echo $row['tags']; ?></td>
							<td><?php echo $row['date']; ?></td>
							
							<td><a href="editpost.php?editid=<?php echo $row['id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete ?');" href="?delid=<?php echo $row['id']; ?> ">Delete</a></td>
						</tr>
							<?php }} ?>
						
					</tbody>
				</table>
	
               </div>
            </div>
		</div>
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
       <?php include "inc/footer.php";?>