<?php include "inc/header.php"; ?>
<?php 
    if (!isset($_GET['pageid']) || $_GET['pageid'] == null) {
      header('Location: 404.php');
    }else{
        $id = $_GET['pageid'];
    }
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php
                    $query = "SELECT * FROM tb_page WHERE id = $id ";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    ?>         
				<h2><?php echo $result['name'];?></h2>
	
			<?php echo $result['body'];?>
				
						<?php }}?>
	</div>

		</div>
		<?php include "inc/sidebar.php"; ?>
	<?php include "inc/footer.php"; ?>
	