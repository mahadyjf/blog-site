<!-- Delete  Page-->
<?php include "../lib/Session.php"; 
	Session::checkSession();
?>
<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/Format.php"; ?>
<?php 
	$db= new Database();
	$fm = new Format();
?>
<?php 
					if (isset($_GET['delpage'])) {
					$delid=$_GET['delpage'];
					$query = "DELETE FROM tb_page WHERE id = '$delid'";
                    $delete = $db->delete($query);
                    if ($delete) {
                        $msg = "<span class='success'>Page Deleted</span>";
                    }else {
                        $msg = "<span class='error'>Page not Deleted</span>";
                    }
                    Session::set('msg', $msg);
                    $home_url ='index.php';
                    header('Location:'.$home_url);
                  }
					
                ?>
<!-- Delete  Page-->