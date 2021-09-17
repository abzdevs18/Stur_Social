<!DOCTYPE html>
<html>
<head>
	<title>Stur</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="icon" href="image/logo.ico">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/formStyle.css">

	<style type="text/css">
	body,html{

	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	}
	.main {
		position: fixed;
		padding-top: 120px; /*position of the login form */
		left: 0;
		right: 0;
	}
		.formCon {
			position: relative;
			margin: auto;
			width: 400px;
			-webkit-animation-name: animate;
			-webkit-animation-duration: 0.7s;
			animation-name: animate;
			animation-duration: 0.7s;
		}
		.signUp{
			border-top: 1px solid gray;
			position: relative;
		    margin: 40px 0 20px;
		    text-align: center;
		}
		span{
			position: relative;
			background-color: #fff;
		    padding: 0 .5em;
		    position: relative;
		    color: #6c7378;
		    top: -.7em;
		}
		.formCon > img {
			width: 150px;
			margin: 0 auto;
			position: absolute;
			left: 0;right: 0;
			margin-right: auto;
			margin-left: auto;
		}
		#f {
			padding-top: 80px;
		}

		@keyframes animate{
			from{
				top: -300px;
				opacity: 0;
			}
			to{
				top: 0;
				opacity: 1;
			}
		}
	</style>
</head>
<body>
	<div class="main">
	<div class="formCon">
		<img src="image/logo.png">
		<form class="go-bottom" id="f" action="inc/log_in.php" method="POST">
			<div class="l_s_form">    
				<input id="user" name="email" type="text" required>    
				<label for="user">Email</label>  
			</div>  
			<div class="l_s_form">    
				<input id="password" name="password" type="password" required><label for="password">Password</label>
			</div>
			<div>
				<button id="subBtn" type="submit" name="submit">Login</button>
			</div> 
		</form>
		<div class="signUp">
			<span>or</span>
			<a href="index.php"><button id="subBtn" style="cursor: pointer;outline: none;">Sign Up</button></a>
		</div> 
	</div>
	</div>
</body>
</html>