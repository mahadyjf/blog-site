
<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>




	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<!-- pagination -->
		<?php 
			$limit = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}
			$offset = ($page-1)*$limit;
		?>
		<!-- pagination -->

		<?php
			$sql = "SELECT * FROM tb_post LIMIT $offset, $limit";
			$post = $db->select($sql);
			if ($post) {
			while($row = $post->fetch_assoc()){
		?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h2>
				<h4><?php echo $fm->formatDate($row['date']); ?>, By <a href="#"><?php echo $row['author']; ?></a></h4>
				 <a href="post.php?id=<?php echo $row['id']; ?>"><img src="admin/<?php echo $row['image'];?>" alt="post image"/></a>
				 <?php echo $fm->textShorten($row['body']); ?>
				<div class="readmore clear">
				<a href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
				</div>
			</div>
			<?php } ?><!-- End While loop -->

			<!-- pagination -->
			<?php 
			$sql = "SELECT * FROM tb_post";
			$result = $db->select($sql);
			$row = mysqli_num_rows($result);
			$total_page = ceil($row/$limit);
			echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";

			for ($i=1; $i <= $total_page ; $i++) {  
				 echo "<a href='index.php?page=".$i."'>".$i."</a>";
			}

			 echo "<a href='index.php?page=".$total_page."'>".'Last Page'."</a></span>"; ?>
			<!-- pagination -->
			<?php }else {
				header("Location:404.php");
			} ?>
			
		

		</div>
	<?php include "inc/sidebar.php"; ?>
	<?php include "inc/footer.php"; ?>
	