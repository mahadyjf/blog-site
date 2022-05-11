<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
    if (!isset($_GET['pageid']) || $_GET['pageid'] == null) {
      header('Location: index.php');
    }else{
        $id = $_GET['pageid'];
    }
?>
<style>
    .actiondel{
        margin-left: 10px;
    }
    .actiondel a{
        border: 1px solid #ddd;
        color: #444;
        cursor: pointer;
        font-size: 20px;
        padding: 2px 10px;
        font-weight: normal;
    }
</style>

                
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Page</h2>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name   = $fm->validation($_POST['name']);
                    $body   = $fm->validation($_POST['body']);
                    

                    if($name == "" || $body == ""){
                        echo "<span class='error'>Field Must be Not Empty</span>";
                    
                    }else {
                        $sql = "UPDATE tb_page
                                        SET
                                        name = '$name',
                                        body = '$body'
                                        WHERE id = '$id'";
                              $catup= $db->update($sql);
                              if ($catup) {
                                echo "<span class='success'>Page Updated Succesfully</span>";
                              }else{
                                echo "<span class='error'>Page Not Update !</span>";
                              }
                    }
                }
                    
                
                ?>
                <div class="block">       
                <?php
                    $query = "SELECT * FROM tb_page WHERE id = $id ";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    ?>          
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                     
                       
                   
                    
                       
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $result['body'];?></textarea>
                            </td>
                        </tr>


                    

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="actiondel"><a href="deletepage.php?delpage=<?php echo $result['id'];?>" onclick="return confirm('Are You Sure to Delete ?');">Delete</a></span>
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
