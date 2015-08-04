<?php
Session_Start();
$f=0;
$frnd_id=$_POST["header1"];
if(IsSet($_POST["accp"])||IsSet($_POST["decl"])) {
	if(IsSet($_POST["accp"])){
				$f=1;
				
	}
	else {
		$f=2;
	}

			if(IsSet($_SESSION["user_id"])) {				
					$resid=MySQLi_Connect('localhost','root','@connectme','shangout');
					if(MySQLi_Connect_Errno()) {
					echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
					}
					else {
						if($f==1) {
							$query="update friends set status=1,comp=1 where receiver_id=".$_SESSION["user_id"]." and friend_id=".$frnd_id.""; 
							$walla1=MySQLi_Query($resid,$query);
							
							$count=MySQLi_Query($resid,"select (max(id)+1) as count  from are_friends");
							$count_id=MySQLi_Fetch_Assoc($count);
							if($count_id["count"]) {
							$query1="insert into are_friends values (".$count_id["count"].",".$_SESSION["user_id"].",".$frnd_id.",1,0)";
							$c = $count_id["count"]+1;
							$query2="insert into are_friends values (".$c.",".$frnd_id.",".$_SESSION["user_id"].",1,0)";
							$walla=MySQLi_Query($resid,$query1);
							$walla=MySQLi_Query($resid,$query2);
							
							}
							else {
							$query1="insert into are_friends values (1,".$_SESSION["user_id"].",".$frnd_id.",1,0)";
							$query2="insert into are_friends values (2,".$frnd_id.",".$_SESSION["user_id"].",1,0)";
							$walla=MySQLi_Query($resid,$query1);
							$walla=MySQLi_Query($resid,$query2);
							}
							
						}
						else if($f==2){
							$query="update friends set status=0,comp=1 where receiver_id=".$_SESSION["user_id"]." and friend_id=".$frnd_id.""; 
							MySQLi_Query($resid,$query);
						}
						else {
							}
					}
					
					MySQLi_Close($resid);
			}
} 
					if(IsSet($_SESSION['user_id'])) {
						
						Header("Location: friends.php");
						
						
						}
					else {
						
						Header("Location: home.php");
					}
?>
