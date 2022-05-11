<?php include "config/config.php"; ?>
<?php include "lib/Database.php"; ?>
<?php include "helpers/Format.php"; ?>
<?php 
	$db= new Database();
	$fm = new Format();
?>
<!DOCTYPE html>
<html>
<head>
<?php
	if(isset($_GET['pageid'])){
		$pageid= $_GET['pageid'];
        $query = "SELECT * FROM tb_page WHERE id = $pageid";
        $value = $db->select($query);
     	if($value){
      	while($result = $value->fetch_assoc()){?>
                <title><?php echo $result['name'];?>-<?php echo TITLE;?></title>     
<?php }}}elseif(isset($_GET['id'])){
		$id= $_GET['id'];
        $query = "SELECT * FROM tb_post WHERE id = $id";
        $value = $db->select($query);
     	if($value){
      	while($result = $value->fetch_assoc()){?>
				<title><?php echo $result['title'];?>-<?php echo TITLE;?></title>

		  <?php }}}else{?>
	<title><?php echo $fm->title();?>-<?php echo TITLE;?></title>
<?php } ?> 
	<title>Basic Website</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
<style>

.pagination{
    display: block;
    font-size: 20px;
    margin-top: 10px;
    padding: 10px;
    text-align: center;
  }
  .pagination a{
  background: #e6af4b no-repeat scroll 0 0;
  border: 1px solid #a7700c;
  border-radius: 3px;
  color: #333;
  margin-left: 2px;
  padding: 2px 10px;
  text-decoration: none;
}
.pagination a:hover{
  background: #beB723 no-repeat scroll 0 0;
  color: #fff;
}
</style>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
			<?php
                    $query = "SELECT * FROM title_slogan where id = 1";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    
                    ?>   
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
						<?php }} ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">

			<?php
                    $query = "SELECT * FROM tb_social where id = 1";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    
                    ?>   
				<a href="<?php echo $result['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
						<?php }} ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a id="active" href="index.php">Home</a></li>
		<?php
                    $query = "SELECT * FROM tb_page";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    ?>      
			
		<li><a href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
						<?php }} ?>
						<li><a href="contact.php">Contact</a></li>
	</ul>
</div>