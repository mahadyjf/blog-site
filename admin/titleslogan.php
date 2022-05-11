<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>



<?PHP
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $title = $fm->validation($_POST['title']);
                    $slogan   = $fm->validation($_POST['slogan']);
                   

                    $permited = array('png');
                    $file_name = $_FILES['logo']['name'];
                    $file_size = $_FILES['logo']['size'];
                    $file_temp = $_FILES['logo']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = 'logo'.'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    if($title == "" || $slogan == "" ){
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

                        $query = "UPDATE title_slogan
                                SET
                                
                                title = '$title',
                                slogan = '$slogan',
                                logo = '$uploaded_image'
                               
                                WHERE id= 1
                                ";

                        $update = $db->update($query);


                    if ($update) {
                        echo "<span class='success'>Data update Succesfully</span>";
                    }else{
                        echo "<span class='error'>Data Not update !</span>";
                    }
                }

            }else{
                $query = "UPDATE title_slogan
                SET
                
                title = '$title',
                slogan = '$slogan'
                WHERE id= 1
                ";

        $update = $db->update($query);


    if ($update) {
        echo "<span class='success'>Data update Succesfully</span>";
    }else{
        echo "<span class='error'>Data Not update !</span>";
    }
            }
       }
                
                ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>

                <div class="block sloginblock">   
                    <?php
                    $query = "SELECT * FROM title_slogan where id = 1";
                    $value = $db->select($query);
                    if($value){
                        while($result = $value->fetch_assoc()){
                    
                    
                    ?>            
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>



                        </tr>
						 <tr>
                            <td>
                                
                                <label>Upload Logo</label>
                            </td>
                            <td>
                            <img src="<?php echo $result['logo'];?>" height="100" width="180" alt="logo"><br>
                                <input type="file" name="logo" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
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
        <div class="clear">
        </div>
    </div>
    <?php include "inc/footer.php";?>
