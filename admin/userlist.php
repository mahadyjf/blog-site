<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>User List</h2>
				<?php 
					if (isset($_GET['delid'])) {
					$delid=$_GET['delid'];
					$query = "DELETE FROM tb_user WHERE id = '$delid'";
					$delete = $db->delete($query);
					if ($delete) {
						echo "<span class='success'>User Deleted Succesfully</span>";
					  }else{
						echo "<span class='error'>User Not Deleted !</span>";
					  }
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql = "SELECT * FROM tb_user ORDER BY id DESC";
						$result = $db->select($sql);
						if ($result) {
							$i =0;
							while($row = $result->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $fm->textShorten($row['details'], 50); ?></td>
                            <td><?php 
                            if($row['role'] == 0){
                                echo "&copy; Admin";
                            }elseif($row['role'] == 1){
                                echo "Author";
                            }elseif($row['role'] == 2){
                                echo "Edetor";
                            }
                            
                            
                            ?></td>
							<td><a href="viewuser.php?userid=<?php echo $row['id']; ?>">View</a> || 
							<?php
							if(Session::get('userRole') == '0'){?>
							<a href="?delid=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure to Delete ?');">Delete</a></td>
							<?php }?>
							
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