<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
    $userid = Session::get('userId');
    $userrole = Session::get('userRole');
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Profile</h2>
                <?PHP
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $fm->validation($_POST['name']);
                    $username   = $fm->validation($_POST['username']);
                    $email  = $fm->validation($_POST['email']);
                    $details  = $fm->validation($_POST['details']);
                    
                    

                        $query = "UPDATE tb_user
                                SET
                                name = '$name',
                                username = '$username',
                                email = '$email',
                                details = '$details'
                                
                                WHERE id= '$userid'
                                ";

                        $update = $db->update($query);


                    if ($update) {
                        echo "<span class='success'>User Data update Succesfully</span>";
                    }else{
                        echo "<span class='error'>User Data Not update !</span>";
                    }
                }

           
                
                ?>
                <div class="block"> 
                    <?php
                    $query1 = "SELECT * FROM tb_user WHERE id =  '$userid' AND role = '$userrole'";
                    $value = $db->select($query1);
                    if($value){
                        while($result1 = $value->fetch_assoc()){
                    
                    ?>              
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result1['name'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result1['username'];?>" class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result1['email'];?>" class="medium" />
                            </td>
                        </tr>
                       
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details"><?php echo $result1['details'];?></textarea>
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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
