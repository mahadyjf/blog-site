<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>Category List</h2>
				<?php 
					if (isset($_GET['delid'])) {
					$delid=$_GET['delid'];
					$query = "DELETE FROM tb_category WHERE id = '$delid'";
					$delete = $db->delete($query);
					if ($delete) {
						echo "<span class='success'>Category Deleted Succesfully</span>";
					  }else{
						echo "<span class='error'>Category Not Deleted !</span>";
					  }
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql = "SELECT * FROM tb_category ORDER BY id DESC";
						$result = $db->select($sql);
						if ($result) {
							$i =0;
							while($row = $result->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $row['id']; ?>">Edit</a> || <a href="?delid=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure to Delete ?');">Delete</a></td>
						</tr>
							<?php }}else{} ?>
						
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