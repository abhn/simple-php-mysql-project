<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
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
			if(IsSet($_SESSION["user_id"])) {
						echo "<tr> <td colspan='5' align='center'> <table align='center'>
							<tr  align='center'>
								<td align='right'>Name:- </td> <td align='left'>".$_SESSION["name"]." </td> </tr> 
								<tr align='center'>
									<td align='right'>Email:- </td> <td align='left'>".$_SESSION["email"]." </td> </tr>
									<tr align='center'>
										<td align='right'>Gender:- </td> <td align='left'>".$_SESSION["gender"]."</td> </tr>
										<tr align='center'>
											<td align='right'>Age:- </td> <td align='left'>".$_SESSION["age"]."  </td> </tr>
											<tr align='center'>
												<td align='right'>Password:- </td> <td align='left'>".$_SESSION["password"]."  </td> </tr> </table> </td> </tr>";
								
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
