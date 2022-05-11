
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

            <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <?php 
    $msg = Session::get('msg');
    if(!empty($msg)){
        echo $msg;
        } 
        ?>
                <div class="block">               
                  Welcome admin panel        
                </div>
            </div>
        </div>

 

<?php include "inc/footer.php";?>

       