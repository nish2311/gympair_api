<?php
 $dbhost = "localhost";
 $dbuser = "infogems";
 $dbpass = "VrouD@!!88";
 $db = "gympair_fitnex";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
//error_reporting(0);

extract($_POST);
extract($_GET);
//print_r($_POST);
//date_default_timezone_set('Europe/Madrid');
$spain_time = date('Y-m-d H:i:s');
$spain_date = date('Y-m-d');
if(isset($category) && $category == '0'){
		$room_s_cat = "SELECT * FROM `gym_clients` JOIN `oc_category` ON `oc_category_description`.`category_id` = `oc_category`.`category_id`";
		$query_s_cat = mysqli_query($conn,$room_s_cat);
		while($row_s_cat = mysqli_fetch_assoc($query_s_cat)){			
			$userData_s_cat[] =  $row_s_cat;
		}

		$count_s_cat = mysqli_num_rows($query_s_cat);
		if($count_s_cat>0){
			$arr_s_cat['result_cat'] = array('msg'=>'Categories fetched successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($gyms) && $gyms == '0'){
		$room_cat = "SELECT * FROM `common_details`";
		$query_cat = mysqli_query($conn,$room_cat);
		while($row_cat = mysqli_fetch_assoc($query_cat)){			
			$userData_cat[] = $row_cat;
		}

		$count_cat = mysqli_num_rows($query_cat);
		if($count_cat>0){
			$arr_cat['result_cat'] = array('msg'=>'Gyms fetched successfully','status'=>'success','details'=>$userData_cat);
			echo json_encode($arr_cat);
		}
		else{
			$arr_cat['result_cat'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr_cat);
		}
mysqli_close($conn);
}elseif(isset($property_desc) && $property_desc == '0'){
	
			$buy_sql = "SELECT `oc_property_description`.*,`oc_property`.*,`oc_property_agent`.`agentname`,`oc_property_agent`.`image`,`oc_property_status`.`name` AS `property_status` FROM `oc_property_description` JOIN `oc_property` ON `oc_property_description`.`property_id` = `oc_property`.`property_id` JOIN `oc_property_agent` ON `oc_property_agent`.`property_agent_id` = `oc_property`.`property_agent_id` JOIN `oc_property_status` ON `oc_property_status`.`property_status_id` = `oc_property`.`property_status_id` WHERE `oc_property_status`.`name` = 'Buy'";
				$buy_query = mysqli_query($conn,$buy_sql);
				while($buy_row = mysqli_fetch_assoc($buy_query)){
					$userData_buy[] =  $buy_row;
				}
				
			$rent_sql = "SELECT `oc_property_description`.*,`oc_property`.*,`oc_property_agent`.`agentname`,`oc_property_agent`.`image`,`oc_property_status`.`name` AS `property_status` FROM `oc_property_description` JOIN `oc_property` ON `oc_property_description`.`property_id` = `oc_property`.`property_id` JOIN `oc_property_agent` ON `oc_property_agent`.`property_agent_id` = `oc_property`.`property_agent_id` JOIN `oc_property_status` ON `oc_property_status`.`property_status_id` = `oc_property`.`property_status_id` WHERE `oc_property_status`.`name` = 'Rent'";
				$rent_query = mysqli_query($conn,$rent_sql);
				while($rent_row = mysqli_fetch_assoc($rent_query)){
					$userData_rent[] =  $rent_row;
				}
			
			$sell_sql = "SELECT `oc_property_description`.*,`oc_property`.*,`oc_property_agent`.`agentname`,`oc_property_agent`.`image`,`oc_property_status`.`name` AS `property_status` FROM `oc_property_description` JOIN `oc_property` ON `oc_property_description`.`property_id` = `oc_property`.`property_id` JOIN `oc_property_agent` ON `oc_property_agent`.`property_agent_id` = `oc_property`.`property_agent_id` JOIN `oc_property_status` ON `oc_property_status`.`property_status_id` = `oc_property`.`property_status_id` WHERE `oc_property_status`.`name` = 'Sell'";
				$sell_query = mysqli_query($conn,$sell_sql);
				while($sell_row = mysqli_fetch_assoc($sell_query)){
					$userData_sell[] =  $sell_row;
				}
			
			$wish_sql = "SELECT `oc_property_description`.*,`oc_property`.*,`oc_property_agent`.`agentname`,`oc_property_agent`.`image` FROM `oc_property_description` JOIN `oc_property` ON `oc_property_description`.`property_id` = `oc_property`.`property_id` JOIN `oc_property_agent` ON `oc_property_agent`.`property_agent_id` = `oc_property`.`property_agent_id` JOIN `oc_property_wishlist` ON `oc_property_wishlist`.`property_id` = `oc_property`.`property_id`";
				$wish_query = mysqli_query($conn,$wish_sql);
				while($wish_row = mysqli_fetch_assoc($wish_query)){
					$userData_wish[] =  $wish_row;
				}
		
		$rooms_cat = "SELECT `oc_property_description`.*,`oc_property`.*,`oc_property_agent`.`agentname`,`oc_property_agent`.`image`,`oc_property_status`.`name` AS `property_status` FROM `oc_property_description` JOIN `oc_property` ON `oc_property_description`.`property_id` = `oc_property`.`property_id` JOIN `oc_property_agent` ON `oc_property_agent`.`property_agent_id` = `oc_property`.`property_agent_id` JOIN `oc_property_status` ON `oc_property_status`.`property_status_id` = `oc_property`.`property_status_id`";
		$querys_cat = mysqli_query($conn,$rooms_cat);
		while($rows_cat = mysqli_fetch_assoc($querys_cat)){
			$userData_s_cat[] =  $rows_cat;
		}

		$count_s_cat = mysqli_num_rows($querys_cat);
		if($count_s_cat>0){
			$arr_s_cat['result_cat'] = array('msg'=>'Properties_fetched_successfully','status'=>'success','buy_details'=>$userData_buy,'rent_details'=>$userData_rent,'sell_details'=>$userData_sell,'wish_details'=>$userData_wish);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($detail_id) && $detail_id == '0'){
		$room_s_cat = "SELECT `gym_clients`.`id`, `gym_clients`.`first_name`, `gym_clients`.`last_name`, `gym_clients`.`dob`, `gym_clients`.`gender`,`gym_clients`.`joining_date`, `gym_clients`.`weight`, `gym_clients`.`height_feet`, `gym_clients`.`height_inches`, `gym_clients`.`image`, `gym_clients`.`client_source`, `gym_clients`.`marital_status` FROM `gym_clients` 
		JOIN `gym_client_purchases` ON `gym_clients`.`id` = `gym_client_purchases`.`client_id` 
		WHERE `gym_client_purchases`.`detail_id` = '1' AND `gym_clients`.`id` != ".$client_log_id;
		$query_s_cat = mysqli_query($conn,$room_s_cat);
		while($row_s_cat = mysqli_fetch_assoc($query_s_cat)){			
			$userData_s_cat[] =  $row_s_cat;
		}
		
		$count_s_cat = mysqli_num_rows($query_s_cat);
		if($count_s_cat>0){
			$arr_s_cat['result_cat'] = array('msg'=>'Pairs fetched successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Property not found','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($login) && $login == '0'){
		
			// $room_cat = "SELECT * FROM `merchants` WHERE `email` =  '".$email."' ";
			// $query_cat = mysqli_query($conn,$room_cat);
			// $row_cat = mysqli_fetch_assoc($query_cat);
			// $salt = $row_cat['remember_token'];
			//echo $pass = Hash::make($password);
			
			// if( \Illuminate\Support\Facades\Hash::check( $pass, $row_cat['password']) == false) {
			  // echo $pass = Hash::make($password); // Password is not matching 
			// } else {
			  // echo 'kkk'; // Password is matching 
			// }
			
			$room_s_cat = "SELECT `id`, `first_name`, `last_name`, `dob`, `gender`, `email`, `address`, `mobile`, `joining_date`, `weight`, `height_feet`, `height_inches`, `image`, `marital_status`, `anniversary` FROM `gym_clients` WHERE `email` = '".$email."' ";
			$query_s_cat = mysqli_query($conn,$room_s_cat);
			while($row_s_cat = mysqli_fetch_assoc($query_s_cat)){			
				$userData_s_cat =  $row_s_cat;
			}
		
		$count_s_cat = mysqli_num_rows($query_s_cat);
		if($count_s_cat > 0){
			$arr_s_cat['result_cat'] = array('msg'=>'Login successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'User is not registered','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($register) && $register == '0'){
	
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$salty = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 9; $i++) {
			$n = rand(0, $alphaLength);
			$salty[] = $alphabet[$n];
		}
		return implode($salty); //turn the array into a string
	}
	$salt = randomPassword();
	
	function randomVerificaionCode() {
		$alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$emily = array(); //remember to declare $pass as an array
		$alphaLengt = strlen($alpha) - 1; //put the length -1 in cache
		for ($k = 0; $k < 7; $k++) {
			$j = rand(0, $alphaLengt);
			$emily[] = $alpha[$j];
		}
		return implode($emily); //turn the array into a string
	}
	$verificationC = randomVerificaionCode();
	$verificationCode = sha1($verificationC . sha1($verificationC . sha1($password)));
	$pass = sha1($salt . sha1($salt . sha1($password)));
	$passo = '$2y$10$sms19nVZUSizMlOIwhvPIen6Ah7scwk8mHl2UxkQ9UNys/jA8On2u';
	$ip = $_SERVER['REMOTE_ADDR'];
/*
	$target_dir = "../image/upload/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(file_exists($target_file)) unlink($target_file);

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		}
		/*
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
		}
		*/
		// Check if $uploadOk is set to 0 by an error
/*
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$pdf_file = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
			}else {
				echo "Sorry, there was an error uploading your file.";
			}
		}		
*/
	$room_cat = "INSERT INTO `gym_clients`(`first_name`, `email`, `password`, `mobile`, `joining_date`, `remember_token`, `created_at`, `updated_at`) VALUES ('$first_name','$email','$passo','$mobile','$spain_date','$verificationC', '$spain_time', '$spain_time')";
	$query_cat = mysqli_query($conn,$room_cat);
	$insert_id = mysqli_insert_id($conn);

	$room_s_cat = "SELECT `id`, `first_name`, `email`, `mobile` FROM `gym_clients` WHERE `id` = ".$insert_id;
	$query_s_cat = mysqli_query($conn,$room_s_cat);
	while($row_s_cat = mysqli_fetch_assoc($query_s_cat)){			
		$userData_s_cat =  $row_s_cat;
	}

	$count_s_cat = mysqli_num_rows($query_s_cat);
	if($count_s_cat>0){
			
			$to = $email;
			$subject = "Verify Your Email Address";

			$message = '<!doctype html>';
			$message .= '<html lang="en-US"><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><title>Please verify your Email Address</title><meta name="description" content="Reset Password Email."><style type="text/css">a:hover {text-decoration: underline !important;}</style></head><body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">';
				
			$message .= '<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
					style="@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700); font-family: sans-serif;">';
			$message .= "<tr><td>";
			$message .= '<table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
			$message .= '<tr>
									<td style="height:80px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="text-align:center;">
									  <a href="https://gympair.com" title="logo" target="_blank">
										<img width="60" src="http://vroudindia.com/dev/estate/image/catalog/upload/logo.png" title="logo" alt="logo">
									  </a>
									</td>
								</tr>
								<tr>
									<td style="height:20px;">&nbsp;</td>
								</tr>
								<tr>
									<td>
										<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
											style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
											<tr>
												<td style="height:40px;">&nbsp;</td>
											</tr>
											<tr>
												<td style="padding:0 35px;">
													<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:sans-serif;">Please verify your email address using the button below. This link will expire in 2 hours.</h1>
													<span
														style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
													<p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
														
													</p>
													<a href="http://gympair.com//verifyemail.php?verificationCode='.$verificationCode.'"
														style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Verify
														Email</a>
												</td>
											</tr>
											<tr>
												<td style="height:40px;">&nbsp;</td>
											</tr>
										</table>
									</td>
								<tr>
									<td style="height:20px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="text-align:center;">
										<p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.gympair.com</strong></p>
									</td>
								</tr>
								<tr>
									<td style="height:80px;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>';
			$message .= "</table>";
				
			$message .= "</body></html>";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <gympair.com@gmail.com>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";

			mail($to,$subject,$message,$headers);
		$arr_s_cat['result_cat'] = array('msg'=>'Registered_successfully','status'=>'success','details'=>$userData_s_cat);
		echo json_encode($arr_s_cat);
	}
	else{
		$arr_s_cat['result_cat'] = array('msg'=>'Email or mobile number already registered','status'=>'failure');
		echo json_encode($arr_s_cat);
	}
mysqli_close($conn);
}elseif(isset($user_id) && $user_id > '0'){
		$user_sql = "SELECT `id`, `first_name`, `last_name`, `dob`, `gender`, `address`, `mobile`, `joining_date`, `weight`, `height_feet`, `height_inches`, `image`, `client_source`, `marital_status`, `anniversary` FROM `gym_clients` WHERE `id` = '".$user_id."'";
		$user_query = mysqli_query($conn,$user_sql);
		while($user_row = mysqli_fetch_assoc($user_query)){			
			$userData_s_cat[] =  $user_row;
		}

		$count_s_cat = mysqli_num_rows($user_query);
		if($count_s_cat>0){
			$arr_s_cat['result_cat'] = array('msg'=>'User details fetched successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($agent_id) && $agent_id > '0'){
		$user_sql = "SELECT * FROM `oc_property_agent` WHERE `property_agent_id` = '".$agent_id."'";
		$user_query = mysqli_query($conn,$user_sql);
		while($user_row = mysqli_fetch_assoc($user_query)){			
			$userData_s_cat[] =  $user_row;
		}

		$count_s_cat = mysqli_num_rows($user_query);
		if($count_s_cat>0){
			$arr_s_cat['result_cat'] = array('msg'=>'Agents details fetched successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($agentemail) && $agentemail == !''){
		$room_cat = "SELECT * FROM `oc_property_agent` WHERE `username` = '".$username."' or `email` =  '".$agentemail."' ";
		$query_cat = mysqli_query($conn,$room_cat);
		$row_cat = mysqli_fetch_assoc($query_cat);
		$salt = $row_cat['salt'];
		$pass = sha1($salt . sha1($salt . sha1($password)));
		$user_sql = "SELECT * FROM `oc_property_agent` WHERE `email` = '".$agentemail."' AND `password` = '".$pass."' ";
		$user_query = mysqli_query($conn,$user_sql);
		while($user_row = mysqli_fetch_assoc($user_query)){			
			$userData_s_cat[] =  $user_row;
		}

		$count_s_cat = mysqli_num_rows($query_s_cat);
		if($count_s_cat>0){
			$arr_s_cat['result_cat'] = array('msg'=>'Agents details fetched successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($shortlist) && $shortlist == '0'){
		$user_sql = "SELECT * FROM `oc_property_wishlist` WHERE `property_agent_id` = '".$pro_agent_id."' AND `user_id` = '".$pro_user_id."' AND `property_id` = '".$prop_id."' ";
		$user_query = mysqli_query($conn,$user_sql);

		$count_s_cat = mysqli_num_rows($user_query);
		if($count_s_cat == '0'){
			
			$room_cat = "INSERT INTO `oc_property_wishlist`(`property_agent_id`, `user_id`, `property_id`, `date_added`) 
				VALUES ('$pro_agent_id','$pro_user_id','$prop_id','$spain_time')";
			$query_cat = mysqli_query($conn,$room_cat);
			$insert_id = mysqli_insert_id($conn);

			$room_s_cat = "SELECT `oc_property_description`.*,`oc_property`.*,`oc_property_agent`.`agentname`,`oc_property_agent`.`image` ,`oc_property_wishlist`.`user_id` FROM `oc_property_description` JOIN `oc_property` ON `oc_property_description`.`property_id` = `oc_property`.`property_id` JOIN `oc_property_agent` ON `oc_property_agent`.`property_agent_id` = `oc_property`.`property_agent_id` JOIN `oc_property_wishlist` ON `oc_property_wishlist`.`property_id` = `oc_property`.`property_id` WHERE `oc_property_wishlist`.`property_wishlist_id` = '".$insert_id."' AND  `oc_property_wishlist`.`user_id` = '".$pro_user_id."'";
			$query_s_cat = mysqli_query($conn,$room_s_cat);
			while($row_s_cat = mysqli_fetch_assoc($query_s_cat)){			
				$userData_s_cat =  $row_s_cat;
			}
			
			$arr_s_cat['result_cat'] = array('msg'=>'Property added to shortlist successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'Property already exists in shortlist','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($update_user_id) && $update_user_id == !''){
		$user_sql = "SELECT * FROM `gym_clients` WHERE `id` = '".$update_user_id."' ";
		$user_query = mysqli_query($conn,$user_sql);

		$count_s_cat = mysqli_num_rows($user_query);
		if($count_s_cat > 0){
			
		$target_dir = "../image/upload/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(file_exists($target_file)) unlink($target_file);

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
			}
			/*
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
			}
			*/
			// Check if $uploadOk is set to 0 by an error
	
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$pdf_file = "https://gympair.com/adminex/image/upload/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
				}else {
					echo "Sorry, there was an error uploading your file.";
				}
			}	
			$room_cat = "UPDATE `gym_clients` SET `first_name` = '$first_name', `dob` = '$dob', `gender` = '$gender', `address` = '$address', `weight` = '$weight', `height_feet` = '$height_feet', `height_inches` = '$height_inches', `image` = '$pdf_file', `marital_status` = '$marital_status', `updated_at` = '$spain_time' WHERE `id` = '".$update_user_id."'";
			$query_cat = mysqli_query($conn,$room_cat);

			$room_s_cat = "SELECT `id`, `first_name`, `dob`, `gender`, `email`, `address`, `mobile`, `joining_date`, `weight`, `height_feet`, `height_inches`, `image`, `marital_status`, `created_at`, `updated_at` FROM `gym_clients` WHERE `id` = '".$update_user_id."'";
			$query_s_cat = mysqli_query($conn,$room_s_cat);
			while($row_s_cat = mysqli_fetch_assoc($query_s_cat)){			
				$userData_s_cat =  $row_s_cat;
			}
			
			$arr_s_cat['result_cat'] = array('msg'=>'User details updated successfully','status'=>'success','details'=>$userData_s_cat);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'User details not updated','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($forgot_email) && $forgot_email == !''){
		$user_sql = "SELECT `id`, `first_name`, `last_name`, `dob`, `gender`, `email`, `address`, `mobile` FROM `gym_clients` WHERE `email` = '".$forgot_email."' ";
		$user_query = mysqli_query($conn,$user_sql);

		$count_s_cat = mysqli_num_rows($user_query);
		if($count_s_cat > 0){
			while($row_s_cat = mysqli_fetch_assoc($user_query)){			
				$userData_s_cat =  $row_s_cat;
			}
			
			$to = $forgot_email;
			$subject = "Password Reset Email";

			$message = '<!doctype html>';
			$message .= '<html lang="en-US"><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><title>Reset Password Email</title><meta name="description" content="Reset Password Email."><style type="text/css">a:hover {text-decoration: underline !important;}</style></head><body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">';
				
			$message .= '<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
					style="@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700); font-family: sans-serif;">';
			$message .= "<tr><td>";
			$message .= '<table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
			$message .= '<tr>
									<td style="height:80px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="text-align:center;">
									  <a href="https://kreebz.com" title="logo" target="_blank">
										<img width="60" src="http://vroudindia.com/dev/estate/image/catalog/upload/logo.png" title="logo" alt="logo">
									  </a>
									</td>
								</tr>
								<tr>
									<td style="height:20px;">&nbsp;</td>
								</tr>
								<tr>
									<td>
										<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
											style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
											<tr>
												<td style="height:40px;">&nbsp;</td>
											</tr>
											<tr>
												<td style="padding:0 35px;">
													<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:sans-serif;">You have
														requested to reset your password</h1>
													<span
														style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
													<p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
														We cannot simply send you your old password. A unique link to reset your
														password has been generated for you. To reset your password, click the
														following link and follow the instructions.
													</p>
													<a href="javascript:void(0);"
														style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
														Password</a>
												</td>
											</tr>
											<tr>
												<td style="height:40px;">&nbsp;</td>
											</tr>
										</table>
									</td>
								<tr>
									<td style="height:20px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="text-align:center;">
										<p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.kreebz.com</strong></p>
									</td>
								</tr>
								<tr>
									<td style="height:80px;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>';
			$message .= "</table>";
				
			$message .= "</body></html>";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <gympair.com@gmail.com>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";

			mail($to,$subject,$message,$headers);
			
			$arr_s_cat['result_cat'] = array('msg'=>'Email has been sent successfully','status'=>'success'/*,'details'=>$userData_s_cat*/);
			echo json_encode($arr_s_cat);
		}
		else{
			$arr_s_cat['result_cat'] = array('msg'=>'User details not updated','status'=>'failure');
			echo json_encode($arr_s_cat);
		}
mysqli_close($conn);
}elseif(isset($msg_desc) && $msg_desc == !''){
		echo $chatins = "INSERT INTO `message`(`msg_to`, `msg_from`, `text`) VALUES ('$msg_to','$msg_from','$msg_desc')";
		$chat_query = mysqli_query($conn,$chatins);
		$chat_ins_row = mysqli_insert_id($conn);
		
		$chat_sql = "SELECT * FROM `message` WHERE `msg_to`= '".$msg_to."' AND `msg_from`= '".$msg_from."'";
		$query_chat = mysqli_query($conn,$chat_sql);
		while($row_chat = mysqli_fetch_assoc($query_chat)){
			$chat_details[] = $row_chat;
		}

		$count_user = mysqli_num_rows($query_chat);
		if($count_user>0){
			$arr['result'] = array('msg'=>'Chat Details inserted successfully','status'=>'success','msg_details'=>$chat_details);
			echo json_encode($arr);
		}
		else{
			$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr);
		}
mysqli_close($conn);
}elseif(isset($msg_details) && $msg_details == '0'){
		$chat_sql = "SELECT * FROM `message` WHERE (`msg_to`= '".$msg_to."' AND `msg_from`= '".$msg_from."') OR (`msg_to`= '".$msg_from."' AND `msg_from`= '".$msg_to."') ";
		$query_chat = mysqli_query($conn,$chat_sql);
		while($row_chat = mysqli_fetch_assoc($query_chat)){
			$chat_details[] = $row_chat;
		}
		$count_user = mysqli_num_rows($query_chat);
		if($count_user>0){
			$arr['result'] = array('msg'=>'Chat Details fetched successfully','status'=>'success','msg_details'=>$chat_details);
			echo json_encode($arr);
		}
		else{
			$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr);
		}
mysqli_close($conn);
}elseif(isset($msg_to_details) && $msg_to_details == '0'){
		$chat_sql = "SELECT * FROM `message` WHERE `msg_from`= '".$msg_from."' ";
		$query_chat = mysqli_query($conn,$chat_sql);
		while($row_chat = mysqli_fetch_assoc($query_chat)){
			$chat_details[] = $row_chat;
		}
		$count_user = mysqli_num_rows($query_chat);
		if($count_user>0){
			$arr['result'] = array('msg'=>'Chat Details fetched successfully','status'=>'success','msg_details'=>$chat_details);
			echo json_encode($arr);
		}
		else{
			$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
			echo json_encode($arr);
		}
mysqli_close($conn);
}elseif(isset($goal_name) && $goal_name == !''){
		$chatins = "INSERT INTO `goal`(`category_id`, `goal`, `created_at`, `updated_at`, `user_id`) VALUES ('1','$goal_name','$created_at','$updated_at','$user_goal_id') ";
		$chat_query = mysqli_query($conn,$chatins);
		$chat_ins_row = mysqli_insert_id($conn);
		if($chat_ins_row > 0){
			$chat_sql = "SELECT * FROM `goal` WHERE `id`= '".$chat_ins_row."' ";
			$query_chat = mysqli_query($conn,$chat_sql);
			while($row_chat = mysqli_fetch_assoc($query_chat)){
				$chat_details[] = $row_chat;
			}
			$count_user = mysqli_num_rows($query_chat);
			if($count_user>0){
				$arr['result'] = array('msg'=>'Goal Added successfully','status'=>'success','msg_details'=>$chat_details);
				echo json_encode($arr);
			}
			else{
				$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
				echo json_encode($arr);
			}
		}
mysqli_close($conn);
}elseif(isset($user_goal_id) && $user_goal_id == !''){
	$chat_sql = "SELECT * FROM `goal` WHERE `user_id`= '".$user_goal_id."' AND `updated_at` = '0000-00-00 00:00:00'";
	$query_chat = mysqli_query($conn,$chat_sql);
	while($row_chat = mysqli_fetch_assoc($query_chat)){
		$chat_details[] = $row_chat;
	}
	$count_user = mysqli_num_rows($query_chat);
	if($count_user>0){
		$arr['result'] = array('msg'=>'Goals fetched successfully','status'=>'success','msg_details'=>$chat_details);
		echo json_encode($arr);
	}
	else{
		$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
		echo json_encode($arr);
	}
mysqli_close($conn);
}elseif(isset($date_goal) && $date_goal == !''){
	$chat_sql = "SELECT * FROM `goal` WHERE `user_id`= '".$user_gd."' AND `created_at` LIKE '%".$date_goal."%' ";
	$query_chat = mysqli_query($conn,$chat_sql);
	while($row_chat = mysqli_fetch_assoc($query_chat)){
		$chat_details[] = $row_chat;
	}
	$count_user = mysqli_num_rows($query_chat);
	if($count_user>0){
		$arr['result'] = array('msg'=>'Goals fetched successfully','status'=>'success','msg_details'=>$chat_details);
		echo json_encode($arr);
	}
	else{
		$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
		echo json_encode($arr);
	}
mysqli_close($conn);
}elseif(isset($end_goal) && $end_goal == !''){
	$room_cat = "UPDATE `goal` SET `updated_at` = '".$end_goal."' WHERE `id`= '".$user_endgoal_id."'";
	$query_cat = mysqli_query($conn,$room_cat);
	
	$chat_sql = "SELECT * FROM `goal` WHERE `id`= '".$user_endgoal_id."' AND `updated_at` = '".$end_goal."' ";
	$query_chat = mysqli_query($conn,$chat_sql);
	while($row_chat = mysqli_fetch_assoc($query_chat)){
		$chat_details[] = $row_chat;
	}
	$count_user = mysqli_num_rows($query_chat);
	if($count_user>0){
		$arr['result'] = array('msg'=>'Goal ended successfully','status'=>'success','msg_details'=>$chat_details);
		echo json_encode($arr);
	}
	else{
		$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
		echo json_encode($arr);
	}
mysqli_close($conn);
}elseif(isset($pair_id) && $pair_id == !''){
	$chatins = "INSERT INTO `pair_users`(`pair_id`, `created_at`, `user_id`) VALUES ('$pair_id','$created_at','$user_pair_id') ";
	$chat_query = mysqli_query($conn,$chatins);
	$chat_ins_row = mysqli_insert_id($conn);
	
	$chat_sql = "SELECT * FROM `pair_users` WHERE `id`= '".$chat_ins_row."' ";
	$query_chat = mysqli_query($conn,$chat_sql);
	while($row_chat = mysqli_fetch_assoc($query_chat)){
		$chat_details[] = $row_chat;
	}
	$count_user = mysqli_num_rows($query_chat);
	if($count_user>0){
		$arr['result'] = array('msg'=>'Paired successfully','status'=>'success','msg_details'=>$chat_details);
		echo json_encode($arr);
	}
	else{
		$arr['result'] = array('msg'=>'Something went wrong','status'=>'failure');
		echo json_encode($arr);
	}
mysqli_close($conn);
}
?>