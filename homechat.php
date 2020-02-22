<!DOCTYPE html>
<?php 
	session_start();
	include("include/connection.php");

	if(!isset($_SESSION['user_email'])){
		header("location: signin.php");
	} 
	else{ ?>
<html>	
<head>
	<title>GrupChat Lokerku</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
	<style type="text/css">
		.main-section{
			border: 1px solid #000;
			width: 100%;
		}
		.left-sidebar{
			background-color: #3a3a3a;
			padding: 0px;
		}
		.searchbox {
			width: 100%;
			padding: 27px 10px;
			border-bottom: 2px solid #000;
		}
		.form-control,.search-icon,.search-icon:hover{
			background-color: #6a6c75;
			border: 1px solid #fff;
			color: #fff;
			box-shadow: none !important;	
		}
		.form-control:focus{
			border:1px solid #fff;
		}
		.chat-left-img,.chat-left-detail {
			float: left;
		}
		.left-chat{
			overflow-y: scroll;
		}
		.left-chat ul{
			overflow: hidden;
			padding: 0px;
		}
		.left-chat ul li{
			list-style: none;
			width: 100%;
			float: left;
			margin: 10px 0px 8px 15px;
		}
		.chat-left-img img{
			width: 50px;
			height: 50px;
			border-radius: 50%;
			text-align: left;
			float: fixed;
			border: 3px solid #6b6f79;
		}
		.chat-left-detail{
			margin-left: 10px;
		} 
		.chat-left-detail p{
			margin:0px;
			color: #fff;
			padding: 7px 0px 0px;
		}
		.chat-left-detail span{
			color: #b8bac3; 
		}
		.chat-left-detail span i{
			color: #86bb71;
			font-size: 10px;
		}
		.chat-left-detail .orange {
			color: #e38968	
		}
		.right-sidebar {
			border-left: 2px solid #000;
		}
		.right-header {
			border-bottom: 2px solid #000;
			margin: 0px;
			padding: 10px 0px 20px 0px;
			background-color: #333;
		}
		.right-header-detail p{
			margin: 0px;
			color: #fff;
			font-weight: bold;
			padding-top: 5px;
		}
		.right-header-detail span{
			color: #9fa5af;
			font-size: 12px;
		}
		.right-header-img img{
			width: 50px;
			height: 50px;
			float: left;
			border-radius: 50%;
			border: 3px solid #61bc71;
			margin-right: 10px;
		}

		.rightside-left-chat,.rightside-right-chat{
			float: left;
			width: 80%;
			position: relative;
		}
		.rightside-right-chat{
			float: right;
			margin-right: 35px;
		}
		.right-header-contentChat{
			overflow-y: scroll;
			background-color: #ffffff;
			position: relative;
		}
		.right-header-contentChat ul li{
			list-style: none;
			margin-top: 20px;
		}
		.right-header-contentChat .rightside-left-chat p,.right-header-contentChat .rightside-right-chat p{
			background-color: #86bb71;
			padding: 15px;
			border-radius: 8px;
			color: #fff;
		}
		.right-header-contentChat .rightside-right-chat p{
			background-color: #94c2ed;
		}
		.right-chat-textbox{
			padding: 15px 30px;
			width: 100%;
			background-color: #3a3a3a;
		}
		.right-chat-textbox input{
			width: 80%;
			height: 40px;
			border: 2px solid #3d85ca;
			border-radius: 5px;
			padding: 0px 10px;
			border: 1px solid #c1c1c1;
		}
		.right-chat-textbox button{
			height: 40px;
			width: 70px;
			margin-left: 20px;
		}
		.rightside-left-chat span i,.rightside-right-chat span i{
			color: #86bb71;
			font-size: 12px;
		}
		.rightside-right-chat span i{
			color: #94c2ed;
		}
		.rightside-right-chat span{
			float: right;
		}
		.rightside-right-chat span small,.rightside-left-side span small{
			color: #bdbdc2;
		}
		.rightside-left-chat:before{
			content: " ";
			position: absolute;
			top: 14px;
			left: 15px;
			bottom: 150px;
			border: 15px solid transparent;
			border-bottom-color: #86bb71;
			z-index: 1;
		}
		.rightside-right-chat:before{
			content: " ";
			position: absolute;
			top: 14px;
			right: 15px;
			bottom: 150px;
			border: 15px solid transparent;
			border-bottom-color: #94c2ed;
		}
		@media only screen and (max-width: 320px){
			.main-section{
				display: none;
			}
		}	
	</style>
</head>
<body>
<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<a href="signin.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Logout</button></a>
						
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<?php include("include/get_users_data.php"); ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
				<div class="row">
					<!-- mendapatkan informasi pengguna yang masuk -->
					<?php 
						$user = $_SESSION['user_email']; 
						$get_user = "select * from users where user_email='$user'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);

						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
					 ?>
					 <!-- mendapatkan data pengguna yang diklik pengguna tersebut -->
					 <?php 
					 	if(isset($_GET['user_name'])){
					 		
					 		global $con;

					 		$get_username = $_GET['user_name'];
					 		$get_user = "select * from users where user_name='$get_username'";

					 		$run_user = mysqli_query($con, $get_user);

					 		$row_user = mysqli_fetch_array($run_user);

					 		$username = $row_user['user_name'];
					 		$user_profile_image = $row_user['user_profile'];
					 	}

					 	$total_messages = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
					 	$run_messages = mysqli_query($con, $total_messages);
					 	$total = mysqli_num_rows($run_messages);

					  ?>
					  <div class="col-md-12 right-header">
					  	<div class="right-header-img">
					  		<img src=<?php echo"$user_profile_image"; ?>>
					  	</div>	
					  	<div class="right-header-detail">
					  		<form method="post">
					  			<p><?php echo"$username"; ?></p>
					  			<span><?php echo $total; ?>Messages</span>&nbsp &nbsp 
					  			<!-- <button name="logout" class="btn btn-danger">Logout</button> -->
					  		</form>
					  		<?php 
					  			if(isset($_POST['logout'])){
					  				$update_msg = mysqli_query($con, "UPDATE users SET log_in = 'Offline' WHERE user_name='$user_name'");
					  				header("Location:signin.php"); 	
					  				exit();
					  			}
					  		 ?>
					  	</div> 	
					 </div>
				 </div>
				 <div class="row">
				 	<div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
				 		<?php 
				 			$update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status = 'read' WHERE sender_username='$username' AND receiver_username='$user_name'");

				 			$sel_msg = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
				 			$run_msg = mysqli_query($con, $sel_msg);

				 			while ($row = mysqli_fetch_array($run_msg)) 
				 			{
				 				$sender_username = $row['sender_username'];
				 				$receiver_username = $row['receiver_username'];
				 				$msg_content = $row['msg_content'];
				 				$msg_date = $row['msg_date'];	
				 		 ?>
				 		 <ul>
				 		 	<?php 
				 		 	if($user_name == $sender_username AND $username == $receiver_username){
				 		 			echo"
				 		 				<li>
				 		 					<div class='rightside-right-chat'>
				 		 						<span>Saya <small>$msg_date</small></span><br><br>
				 		 						<p>$msg_content</p>
				 		 					</div>
				 		 				</li>
				 		 			";		
				 		 		}

				 		 		else if($user_name == $receiver_username AND $username == $sender_username){
				 		 			echo"
				 		 				<li>
				 		 					<div class='rightside-left-chat'>
				 		 						<span>$username <small>$msg_date</small><br><br></span>
				 		 						<p>$msg_content</p>
				 		 					</div>
				 		 				</li>
				 		 			";
				 		 		}		

				 		 	 ?>
				 		 </ul>
				 		 	<?php 
				 		 		}
				 		 	 ?>
				 	</div>
				 </div>
				 <div class="row">
				 	<div class="col-md-12 right-chat-textbox">
				 		<form method="post">
				 			<input type="text" name="msg_content" autocomplete="off" placeholder="Tulis pesan anda">
				 			<button class="btn" name="submit"><i class="fab fa-telegram-plane" aria-hidden="true"></i></button>			
				 		</form>
				 	</div>
				</div>
			</div>				
		</div>
	</div>
	<?php 
		if(isset($_POST['submit'])) {
			
			$msg = htmlentities($_POST['msg_content']);

			if($msg == "") {
			 	echo "
			 		<div class='alert alert-danger'>
			 			<strong><center>Pesan tidak dapat dikirim</center></strong>
			 		</div>	
			 	";
			 } 
			 else if (strlen($msg) >100) {
			 	echo "
			 		<div class='alert alert-danger'>
			 			<strong><center>Pesan terlalu panjang. Hanya dapat menggunakan 100 karakter</center></strong>
			 		</div>	
			 	";	
			 }
			 else{
			 	$insert = "insert into users_chat(sender_username, receiver_username, msg_content, msg_status, msg_date) values('$user_name', '$username', '$msg', 'unread', NOW())";
			 	$run_insert = mysqli_query($con, $insert);
			 }
		}

	 ?>

	 <script>
	 	$('#scrolling_to_bottom').animate({
	 		scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
	 </script>
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		var height = $(window).height();
	 		$('.left-chat').css('height', (height - 92) + 'px');
	 		$('.right-header-contentChat').css('height', (height - 163) + 'px');
	 	});
	 </script>
</body>
</html>
<?php } ?>

