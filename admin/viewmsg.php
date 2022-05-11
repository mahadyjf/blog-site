<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == null) {
      header('Location: inbox.php');
    }else{
        $id = $_GET['msgid'];
    }
    ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                   echo "<script>window.location = 'inbox.php';</script>";
                }
               ?>
              <?php 
              $sql = "SELECT * FROM tb_contact WHERE id = '$id' ";
              $result = $db->select($sql);
              if ($result) {
                  $i =0;
                  while($row = $result->fetch_assoc()){
                      $i++;
              ?>
                
              
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['fname']." ".$row['lname']; ?>" class="medium" />
                            </td>
                        </tr>
                     

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" name="name" value="<?php echo $row['email']; ?>" class="medium" />
                            </td>
                        </tr>
                       
                   
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $fm->formatDate($row['date']); ?>" class="medium" />
                            </td>
                        </tr>
                       
                     
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $row['body']; ?></textarea>
                            </td>
                        </tr>


                    

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                  <?php }} ?>
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
