<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <?PHP
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name   = $fm->validation($_POST['name']);
                    $body   = $fm->validation($_POST['body']);
                    

                    if($name == "" || $body == ""){
                        echo "<span class='error'>Field Must be Not Empty</span>";
                    
                    }else {
                        $query = "INSERT INTO tb_page (name, body)
                        VALUES ('$name', '$body')";

                        $insert = $db->insert($query);


                    if ($insert) {
                        echo "<span class='success'>Page Created Succesfully</span>";
                    }else{
                        echo "<span class='error'>Page Not Created  !</span>";
                    }
                    }
                }
                    
                
                ?>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                       
                   
                    
                       
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
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
