<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>

                <?PHP
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $note = $fm->validation($_POST['note']);
                   
                    if($note  == "" ){
                        echo "<span class='error'>Field Must be Not Empty</span>";
                    }else{
                        $query = "UPDATE tb_footer
                                SET
                                
                                note = '$note'
                                WHERE id= 1
                                ";

                        $update = $db->update($query);


                        if ($update) {
                            echo "<span class='success'>Copyright update Succesfully</span>";
                        }else{
                            echo "<span class='error'>Copyright Not update !</span>";
                        }
                    }
                }

                    ?>
                <div class="block copyblock"> 
                <?php
                    $query = "SELECT * FROM tb_footer where id = 1";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    
                    ?>   
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['note'];?>" name="note" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
