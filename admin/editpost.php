<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>


<?php 
    if (!isset($_GET['editid']) || $_GET['editid'] == null) {
      header('Location: postlist.php');
    }else{
        $id = $_GET['editid'];
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?PHP
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $title = $fm->validation($_POST['title']);
                    $cat   = $fm->validation($_POST['cat']);
                    $body  = $fm->validation($_POST['body']);
                    $tags  = $fm->validation($_POST['tags']);
                    $author= $fm->validation($_POST['author']);

                    $permited = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == ""){
                        echo "<span class='error'>Field Must be Not Empty</span>";
                    }
                    
                    if(!empty($file_name)){
                    
                    
                    if($file_size > 1048567){
                        echo "<span class='error'>Image Size Should be less Then 1Mb!</span>";
                    }elseif(in_array($file_ext, $permited) === false){
                        echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
                    }
                    else {
                        move_uploaded_file($file_temp, $uploaded_image);

                        $query = "UPDATE tb_post
                                SET
                                cat = '$cat',
                                title = '$title',
                                body = '$body',
                                image = '$uploaded_image',
                                author = '$author',
                                tags = '$tags'
                                WHERE id= '$id'
                                ";

                        $update = $db->update($query);


                    if ($update) {
                        echo "<span class='success'>Post update Succesfully</span>";
                    }else{
                        echo "<span class='error'>Post Not update !</span>";
                    }
                }

            }else{
                $query = "UPDATE tb_post
                SET
                cat = '$cat',
                title = '$title',
                body = '$body',
                author = '$author',
                tags = '$tags'
                WHERE id= '$id'
                ";

        $update = $db->update($query);


    if ($update) {
        echo "<span class='success'>Post update Succesfully</span>";
    }else{
        echo "<span class='error'>Post Not update !</span>";
    }
            }
       }
                
                ?>
                <div class="block"> 
                    <?php
                    $query1 = "SELECT * FROM tb_post WHERE id = $id";
                    $value = $db->select($query1);
                    if($value){
                        while($result1 = $value->fetch_assoc()){
                    
                    ?>              
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $result1['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option value="">Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM tb_category";
                                    $cat = $db->select($sql);
                                    if($cat){
                                        while($result = $cat->fetch_assoc()){
                                    
                                    ?>
                                    <option 
                                    <?php
                                    if($result1['cat'] == $result['id']){?>
                                    selected = "selected"
                                    <?php } ?>
                                    value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                        <?php }} ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                       
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $result1['image'];?>" height="80px" width="180px" alt=""><br>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $result1['body'];?></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $result1['tags'];?>" class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $result1['author'];?>" class="medium" />
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                                        <?php }} ?>
                </div>
            </div>
        </div>
        <?php include "inc/footer.php";?>
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
