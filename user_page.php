<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	
	<script src='jquery.js'></script>
	<script type='text/javascript'>
	$(document).ready(function() 
	{
		$("#sam").hide(2000);
	});
	</script>
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>
			<!--Logo-->
			<tr>
				<td  colspan='5'><img src='images/logo.png' height='65%' width='100%' ></td> <!--1350x160-->
			</tr>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='user_page.php'>"; } else {echo "<a href='home.php'>";}?>Home </a></td>
				<td width='5%'> <a href='send_message.php'>Send Message </a></td>
				<td width='5%'> <a href='inbox.php'>Inbox (Only Recent Message) </a></td>
				<td width='5%'> <a href='view_profile.php'>View Profile </a></td>
				<td width='5%'> <a href='signout.php'>Signout </a></td>

			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
			</tr>
			
			<?php
			//Session_start();
			$email=$password=$no_msg="";
			
			if(!isset($_SESSION['user_id']) && !isset($_POST['h1'])) {
			 Header("Location: home.php");
			}
			

			if(isset($_SESSION['user_id'])) {
				$_POST['h1'] = "holla";
				$_POST['e1'] = $_SESSION['email'];
				$_POST['p1'] = $_SESSION['password'];
				$no_msg = 1;
			}

		function sec($data) {
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
			if($_POST['h1']=="holla") {
			$email=sec($_POST["e1"]);
		    $password=$_POST["p1"];
			}
			$query="select * from students where email='$email' and password='$password'";
			$resid=MySQLi_Connect('localhost','root','@connectme','shangout');
			if(MySQLi_Connect_Errno()) {
				echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
			}
			else {
				$result=MySQLi_Query($resid,$query);
				
				$array=MySQLi_Fetch_Assoc($result);
					if($array) {
						//Session_start();
						$_SESSION["user_id"] = $array["id"]; 
						$user_here = $_SESSION["user_id"];
						$_SESSION["name"] = $array["name"];
						$_SESSION["password"] = $array["password"];
						$_SESSION["age"]  = $array["AGE"];
						$_SESSION["email"] = $array["email"];
						$_SESSION["gender"] = $array["gender"];
						if($no_msg!=1) {
							?>
							<script type="text/javascript" src="notify.js"></script>
							<script>
							$(document).ready(function() {
							  $.notify(
							  "Login Successful!","success");
							});
							</script>
						<!--echo "<tr align='center' id='sam'> <td colspan='5'> <font color='green'>Login Successful, ".$_SESSION["name"]."! </font> </td> </tr>"; -->
						<?php }
						echo "<tr> 
						<td width='5%' valign='top'> 
							<table>
								<tr align='center' bgcolor='lightgrey' class='td_bor'>
									<td width='5%'> <a href='friends.php'>Friends </a></td> </tr>
								<tr align='center' bgcolor='lightgrey' class='td_bor'> 
									<td width='5%'> <a href='update_status.php'> Status Update </td> </tr>
								<tr align='center' bgcolor='lightgrey' class='td_bor'>
									<td width='5%'> <a href='friend_list.php'>Friend List</a></td></tr>
							</table>
						</td>
				
				<td colspan='4'>";
				
						echo "<table  cellpadding='4' cellspacing='5' width='100%' style='table-layout:fixed'> <col width='100%'> <tr align='centre'> <th> <h3> Updates from your Friends: </h3> </th> </tr> ";
				
						$count = MySQLi_Query($resid,"select frnd_two_id from are_friends where frnd_one_id = $user_here union select frnd_one_id from are_friends where frnd_two_id = $user_here");
						if($count) {
						$f=1;
						while(($rows=MySQLi_Fetch_Row($count))==True) {
							$f=2;
							$query = "select status,time_format(timestamp,'%l:%i:%s %p') as time,date_format(timestamp,'%D of %M,%Y') as date from status_here where user_id = $rows[0] order by id desc";
							$queryx = "select name from students where id = $rows[0]";
							$result = MySQLi_Query($resid,$query);
							$result1 = MySQLi_Query($resid,$queryx);
							$name_here =MySQLi_Fetch_Row($result1);
							if($result) {

										while(($rows1=MySQLi_Fetch_Row($result))==True) {
											
											echo "<tr> <td> <font style='color:blue'>$name_here[0]: </font> </td> </tr>";
											echo "<tr> <td style='word-wrap:break-word'> $rows1[0] </td> </tr>";
											echo "<tr> <td> (On $rows1[2] at $rows1[1]) </td> <tr>";
											
										}
										
							}

							
						}
						if($f==1) {
							echo "<table> <tr align='centre'> <td>  <i> Sorry, you don't have friends yet! </i>  </td> </tr> </table>";
						}
						echo "</table>";
						
					}
					

						echo "</td>
							
						</tr>";
					}
					else {
						echo "<tr align='center'> <td colspan='5'> <font color='red'> Login Failed! </font> Make sure you input your email and password correctly and login again:- <a href='login.php'>Login</a> </td> </tr>";
					}
			MySQLi_Close($resid);
			}
		
		?>	
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	<?php if(isset($_SESSION["user_id"])) {echo $_SESSION["name"]; } ?>
			</footer>
</body>
</html>
