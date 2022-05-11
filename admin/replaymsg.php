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
                 $to       = $fm->validation($_POST['toemail']);
                 $from     = $fm->validation($_POST['fromemail']); 
                 $sub      = $fm->validation($_POST['sub']);
                 $msg      = $fm->validation($_POST['message']);
                 $sendmail = mail($to, $sub, $msg, $from);
                 if ($sendmail) {
                    echo "<span class='success'>Message Send Succesfully</span>";
                    }else{
                        echo "<span class='error'>Something Want Wrong !</span>";
                    }
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
                                <label>To</label>
                            </td>
                            <td>
                                <input type="email" name="toemail" readonly value="<?php echo $row['email']; ?>" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="email" name="fromemail" placeholder="Please Enter Your Email Address" class="medium" />
                            </td>
                        </tr>
                       
                   
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                            <input type="text" name="sub" placeholder="Please Enter Subject" class="medium" />
                            </td>
                        </tr>
                       
                     
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message"></textarea>
                            </td>
                        </tr>


                    

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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
