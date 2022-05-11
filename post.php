<?php include "inc/header.php"; ?>
<?php
	if(!isset($_GET['id']) || $_GET['id'] == null){
		header('Location:404.php');
	}else{
		$id = $_GET['id'];
	}

?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				$sql = "SELECT * FROM tb_post WHERE id=$id";
				$post = $db->select($sql);
				if($post){
					while($row = $post->fetch_assoc()){
				?>
				<h2><?php echo $row['title']; ?></h2>
				<h4><?php echo $fm->formatDate($row['date']); ?>, <a href="#"><?php echo $row['author']; ?></a></h4>
				<img src="admin/<?php echo $row['image'];?>">
				<?php echo ($row['body']); ?>
					


				<div class="relatedpost clear">
					<h2>Related articles</h2>

					<?php
					$catid = $row['cat'];
					$related = "SELECT * FROM tb_post WHERE cat = '$catid' ORDER BY rand() LIMIT 6";
					$relatedPost = $db->select($related);
					if($relatedPost){
						while($rr = $relatedPost->fetch_assoc()){
					
					?>
					<a href="post.php?id=<?php echo $rr['id']; ?>"><img src="admin/<?php echo $rr['image'];?>" alt="post image"/></a>
						<?php }}else {echo "No Related Post Available"; }?>
				</div>
				<?php } }else {
				header("Location:404.php");
			} ?>
	</div>

		</div>
	<?php include "inc/sidebar.php"; ?>
	<?php include "inc/footer.php"; ?>