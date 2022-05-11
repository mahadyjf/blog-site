<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
    if (!isset($_GET['catid']) || $_GET['catid'] == null) {
      header('Location: catlist.php');
    }else{
        $id = $_GET['catid'];
    }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                   <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                          $name = $fm->validation($_POST['name']);
                          $name = mysqli_real_escape_string($db->con, $name);
                          if(empty($name)){
                              echo "<span class='error'>Field Must not be empty !</span>";
                          }else{
                              $sql = "UPDATE tb_category
                                        SET
                                        name = '$name'
                                        WHERE id = '$id'";
                              $catup= $db->update($sql);
                              if ($catup) {
                                echo "<span class='success'>Category Updated Succesfully</span>";
                              }else{
                                echo "<span class='error'>Category Not Update !</span>";
                              }
                        }
                        }
                   ?>


                <?php
                    $query= "SELECT * FROM tb_category WHERE id= $id";
                    $category= $db->select($query);
                    while($result = $category->fetch_assoc()){
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include "inc/footer.php";?>
       
