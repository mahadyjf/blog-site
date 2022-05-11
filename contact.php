<?php include "inc/header.php"; ?>
<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$fname = $fm->validation($_POST['fname']);
			$lname = $fm->validation($_POST['lname']);
			$email = $fm->validation($_POST['email']);
			$body = $fm->validation($_POST['body']);
			$fname = mysqli_real_escape_string($db->con, $fname);
			$lname = mysqli_real_escape_string($db->con, $lname);
			$email = mysqli_real_escape_string($db->con, $email);
			$body = mysqli_real_escape_string($db->con, $body);
			$error = "";
			if(empty($fname)){
				$error = "First name must not be empty";
			}elseif(empty($lname)){
				$error = "Last name must not be empty";
			}elseif(empty($email)){
				$error = "Email must not be empty";
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error = "Invalid Email Address";
			}elseif(empty($body)){
				$error = "Message must not be empty";
			}else{

				  $query = "INSERT INTO tb_contact (fname, lname, email, body)
                        VALUES ('$fname', '$lname', '$email', '$body')";

                        $insert = $db->insert($query);


                    if ($insert) {
                        $msg = "<span style='color:green'>Messege Send Succesfully</span>";
                    }else{
                        $error = "<span class='error'>Messege Not Send !</span>";
                    }
			}
		}
		
?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
				if (isset($error)) {
					echo "<span style='color:red'>$error</span>";
				}
				if (isset($msg)) {
					echo "<span style='color:green'>$msg</span>";
				}
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="fname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
	</div>
	<?php include "inc/sidebar.php"; ?>
	<?php include "inc/footer.php"; ?>