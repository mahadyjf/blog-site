<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

        <div class="grid_10">
            <div class="box round first grid">
				<h2>Inbox</h2>
				<?php 
					if(isset($_GET['seenid'])){
						$seenid = $_GET['seenid'];

						$sql = "UPDATE tb_contact
						SET
						status = '1'
						WHERE id = '$seenid'";
				$catup= $db->update($sql);
				if ($catup) {
				echo "<span class='success'>msg sent seen box</span>";
				}else{
				echo "<span class='error'>Something wrong !</span>";
				}
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Name</th>
							<th width="15%">Email</th>
							<th width="25%">Message</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM tb_contact WHERE status = '0' ORDER BY id DESC";
						$result = $db->select($sql);
						if ($result) {
							$i =0;
							while($row = $result->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['fname']." ".$row['lname']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $fm->textShorten($row['body'], 80); ?></td>
							<td><?php echo $fm->formatDate($row['date']); ?></td>
							<td>
							<a href="viewmsg.php?msgid=<?php echo $row['id']; ?>">View</a> || 
							<a href="replaymsg.php?msgid=<?php echo $row['id']; ?>">Replay</a> ||
							<a href="?seenid=<?php echo $row['id']; ?>" onclick="return confirm('Are you Sure to sent msg. in seen box?'); ">Seen</a>

						</td>
						</tr>
							<?php }}?>
						
					</tbody>
				</table>
               </div>
			</div><!-- 1st -->
			


			<div class="box round first grid"><!-- Seen box -->
				<h2>Seen Message</h2>
				<?php 
					if(isset($_GET['Unseenid'])){
						$Unseenid = $_GET['Unseenid'];

						$sql = "UPDATE tb_contact
						SET
						status = '0'
						WHERE id = '$Unseenid'";
				$catup= $db->update($sql);
				if ($catup) {
				echo "<span class='success'>msg sent Inbox</span>";
				}else{
				echo "<span class='error'>Something wrong !</span>";
				}
					}
				?><!-- unseen -->


				<?php 
					if (isset($_GET['delid'])) {
					$delid=$_GET['delid'];
					$query = "DELETE FROM tb_contact WHERE id = '$delid'";
					$delete = $db->delete($query);
					if ($delete) {
						echo "<span class='success'>Message Deleted Succesfully</span>";
					  }else{
						echo "<span class='error'>Message Not Deleted !</span>";
					  }
					}
				?>
                <div class="block">        
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Name</th>
							<th width="15%">Email</th>
							<th width="25%">Message</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM tb_contact WHERE status = '1' ORDER BY id DESC";
						$result = $db->select($sql);
						if ($result) {
							$i =0;
							while($row = $result->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['fname']." ".$row['lname']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $fm->textShorten($row['body'], 80); ?></td>
							<td><?php echo $fm->formatDate($row['date']); ?></td>
							<td>
							<a href="?delid=<?php echo $row['id']; ?>" onclick="return confirm('Are you Sure to Delete?'); ">Delete</a>||
							<a href="?Unseenid=<?php echo $row['id']; ?>" onclick="return confirm('Are you Sure to sent msg. in Inbox?'); ">UnSeen</a>

						</td>
						</tr>
							<?php }}?>
						
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
