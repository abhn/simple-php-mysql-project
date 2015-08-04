<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<script type='text/javascript'>
		function sec() {
			var f_search=document.f1.search.value;
			if(f_search==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
			}
			
			else if(f_search>50) {
				s2.innerHTML="<font color='red'>Characters should be less than 50 </font>";
			}
			
			else {
				document.f1.submit();
			}
			
		}
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
			
				<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='search_friends.php'>
						<table>
							<tr>
								<td> Search Friend:- </td> <td> <input type='text' name='search' maxlength='50'> </td> <td> <span id='s1'> </span> </td> <td> <span id='s2'> </span> </td>
							</tr>
							<tr>
								<td colspan='4' align='center'> <br> <input type='button' value='Search' onclick='sec()'> </td>
							</tr>
						</table>
					</form>
						</td>
				</tr>
				
				
			
			<?php
			if(IsSet($_SESSION["user_id"])) {
					$id=$_SESSION["user_id"];
					$query="select friend_name,friend_id from friends where receiver_id=".$id." and status=0 and comp=0";
					$res_id=MySQLi_Connect('localhost','root','@connectme','shangout');
				
					if(MySQLi_Connect_Errno()) {
						echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
					}
					else {
						$result=MySQLi_Query($res_id,$query);
						if($result==true) {
							$f=1;
							while(($rows=MySQLi_Fetch_Row($result))==True) {
							$f++;
							if($f==2) {
							echo "<tr align='center'> <td colspan='5'>Friend Requests:-</td> </tr>";
							}
							echo "<tr align='center'> <td colspan='5'>".$rows[0].", wants to be your friend! <form method='POST' action='access.php'>
							<input type='hidden' name='header1' value='".$rows[1]."'>
							<input type='submit' name='accp' value='Accept'> &nbsp;&nbsp;&nbsp; <input type='submit' name='decl' value='Decline'>
							</form></td> </tr>";
							
							}
							
						}	
						
						if($f<2)
						{
							echo "<tr align='center'> <td colspan='5'><font color='lightblue'> No Friend Requests!</font> </td> </tr>";
						}
						
						MySQLi_Close($res_id);	
					}
				
			}
			else {
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";
			}
			?>
			
		</table>
		<footer align='center'>
			&copy; All Rights Reserved.	
			</footer>
</body>
</html>

