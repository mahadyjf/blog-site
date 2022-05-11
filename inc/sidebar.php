<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
						$sql = "SELECT * FROM tb_category LIMIT 4";
						 $cat = $db->select($sql);
						 if($cat){
							 while($result = $cat->fetch_assoc()){
						?>
						<li><a href="posts.php?category=<?php echo $result['id']?>"><?php echo $result['name']?></a></li>
							<?php }}else{?>
								 <li>NO Category</li>
						<?php }?>					
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
				$sql = "SELECT * FROM tb_post ORDER BY id DESC LIMIT 5";
				$post = $db->select($sql);
				if($post){
					while($r = $post->fetch_assoc()){
				
				?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $r['id']; ?>"><img src="admin/<?php echo $r['image'];?>" alt="post image"/></a>
						<?php echo $fm->textShorten($r['body'], 50); ?>
					</div>
					<?php }}else{
						header('Location: 404.php');
					}?>
					
					
	
			</div>
			
		</div>