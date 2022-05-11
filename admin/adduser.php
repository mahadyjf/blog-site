<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
 if(!Session::get('userRole') == '0'){
     echo "<script>window.location = 'index.php';</script>";
 }
                    
?>

<div class="grid_10">

<div class="box round first grid">
    <h2>Add New User</h2>
    <div class="block copyblock"> 
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $fm->validation($_POST['username']);
                $pass = $fm->validation(md5($_POST['pass']));
                $role = $fm->validation($_POST['role']);
               
                $username = mysqli_real_escape_string($db->con, $username); 
                $pass = mysqli_real_escape_string($db->con, $pass);
                $role = mysqli_real_escape_string($db->con, $role);
                if(empty($username) || empty($pass) || empty($role)){
                    echo "<span class='error'>Field Must not be empty !</span>";
                }else{
                    $sql = "INSERT INTO tb_user (username, password, role) VALUES('$username', '$pass', '$role') ";
                    $catIn= $db->insert($sql);
                    if ($catIn) {
                    echo "<span class='success'>User Created Succesfully</span>";
                    }else{
                    echo "<span class='error'>User Not Created !</span>";
                    }
            }
            }
        ?>
        <form action="" method="POST">
        <table class="form">					
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>
                    <input type="text" name="username" placeholder="Enter  UserName..." class="medium" />
                </td>
            </tr>


            <tr>
                <td>
                    <label for="pass">Password</label>
                </td>
                <td>
                    <input type="text" name="pass" placeholder="Enter  Password..." class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label for="role">User Role</label>
                </td>
                <td>
                   <select name="role" id="select">
                       <option value="">Select User Role</option>
                       <option value="0">Admin</option>
                       <option value="1">Author</option>
                       <option value="2">Editor</option>
                   </select>
                </td>
            </tr>



            <tr> 
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Create" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>
<?php include "inc/footer.php";?>

