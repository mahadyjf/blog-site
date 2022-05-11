<?php include "inc/header.php"; ?>


<?php 
if(!isset($_GET['category']) || $_GET['category'] == null){
    header('Location: 404.php');
}else{
    $catid = $_GET['category'];
}

?>




	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

        <?php
			$sql = "SELECT * FROM tb_post WHERE cat = $catid";
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
            <?php }}else {
				header("Location:404.php");
			} ?>
			
        </div>



	<?php include "inc/sidebar.php"; ?>
        <?php include "inc/footer.php"; ?>
