<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
    if (!isset($_GET['userid']) || $_GET['userid'] == null) {
      header('Location: userlist.php');
    }else{
        $id = $_GET['userid'];
    }
?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View User</h2>
                <?PHP
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo "<script>window.location = 'userlist.php';</script>";
                }

           
                
                ?>
                <div class="block"> 
                    <?php
                    $query1 = "SELECT * FROM tb_user WHERE id =  '$id'";
                    $value = $db->select($query1);
                    if($value){
                        while($result1 = $value->fetch_assoc()){
                    
                    ?>              
                 <form action="" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input readonly type="text" name="name" value="<?php echo $result1['name'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input readonly type="text" name="username" value="<?php echo $result1['username'];?>" class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly type="text" name="email" value="<?php echo $result1['email'];?>" class="medium" />
                            </td>
                        </tr>
                       
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea readonly class="tinymce" name="details"><?php echo $result1['details'];?></textarea>
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                                        <?php }} ?>
                </div>
            </div>
        </div>
        <?php include "inc/footer.php";?>
      
