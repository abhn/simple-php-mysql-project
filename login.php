<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
		<script type='text/javascript'>
		function sec() {
			var email=document.f1.e1.value;
			var password=document.f1.p1.value;
			
			
			if(email.length==0||password.length==0) {

				if(email.length==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
				
				}

				
				if(password.length==0) {
				s2.innerHTML="<font color='red'>Field is Required</font>";
				
				}
			}
			
			else if (email.length>50||password.length>50) {

				if(email.length>50) {
				s3.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
				
				if(password.length>50) {
				s4.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
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
				<td width='5%'> <a href='home.php'> Home </a></td>
				<td width='5%'> <a href='login.php'>Login </a></td>
				<td width='5%'> <a href='secure_signup.php'>Sign-up </a></td> 
				<td width='5%'> <a href='contact-us.html'>Contact-Us </a></td>
				<td width='5%'> <a href='about-us.html'>About-us </a></td>
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
					<form method='POST' name='f1' action='user_page.php'>
						<table>
							<tr>
								<td> Email:- </td> <td> <input type='email' name='e1' maxlength='50'> </td> <td> <span id='s1'> </span> </td>  <td> <span id='s3'> </span> </td>
							</tr>
							
							<tr>
								<td> Password:- </td> <td> <input type='password' name='p1' maxlength='50'> </td> <td> <span id='s2'> </span> </td> <td> <span id='s4'> </span> </td>
							</tr>
							
							<tr>
								<td> </td> <td> <input type='hidden' name='h1' value='holla'>  </td>
							</tr>
							
							<tr>
								<td> <br> <input type='button' value='Login' name='s1' onclick='sec()'> </td> <td> <br> OR <a href='secure_signup.php'>Sign-up</a></td> 
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
		<footer align='center'>
			&copy; All Rights Reserved.	
			</footer>
</body>
</html>




