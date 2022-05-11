</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php
                    $query = "SELECT * FROM tb_footer where id = 1";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    
                    ?>   
	  <p>&copy; <?php echo $result['note']; echo date('Y');?></p>
						<?php }} ?>
	</div>
	<div class="fixedicon clear">
	<?php
                    $query = "SELECT * FROM tb_social where id = 1";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    
                    ?>  
		<a href="<?php echo $result['fb'];?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['tw'];?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['ln'];?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['gp'];?>"><img src="images/gl.png" alt="GooglePlus"/></a>
						<?php }} ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>