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

	$user_id = $_SESSION["user_id"];
	include 'mysql.php';
	if($resid) {
	
	
	$count = MySQLi_Query($resid,"select frnd_two_id from are_friends where frnd_one_id = $user_id union select frnd_one_id from are_friends where frnd_two_id = $user_id");
	
	echo "<tr align='center'> <td colspan='5'>Your Friends:- </td> </tr> <tr align='center'> <td colspan='5'><table align='center' >";
	
	echo " <table align='center' cellspacing='5' cellpadding='5'> 
				<tr> <th> Name: </th> <th> Email: </th> <th> Gender: </th> </tr>";
				
	while(($rows=MySQLi_Fetch_Row($count))==True) {

	$query = "select name,email,gender from students where id = $rows[0] ";
	$result = MySQLi_Query($resid,$query);

	if($result) {

				while(($rows=MySQLi_Fetch_Row($result))==True) {



				echo "<tr align='center'>";
				echo "<td> $rows[0] </td> <td> $rows[1] </td> <td> $rows[2] </td>";
				echo "</tr>";
				}
				
		}
	}
	
	echo "</table> ";
}
	
	
?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	
			</footer>
</body>
</html>		
