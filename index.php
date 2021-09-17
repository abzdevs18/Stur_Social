<?php 
	include 'header.php';
	// error_reporting(0);
	?>
	<main>
		<?php
		if (!isset($_SESSION['usrName'])) {?>
			
		<div class="people">
			<div class="images" id="img">
			</div>
			<span id="signText">Make your Life more connected.<br><i>Stur</i> it now.</span>
		</div>
		<div class="registrationForm">
			<div class="punchLine">
				<p>Sign up for free.</p>
				<p style="color: var(--darkFont);font-weight: bold;font-size: 13px;padding: 10px 0;">
					Personal account
				</p>
				<p id="secondSignText">Stay connected to the online world.<br> With one account</p>
			</div>
			<form class="go-bottom" action="inc/sign_up.php" method="POST">
				<p id="accountType"></p>
				<div>
					<select id="position" class="position" type="text" name="position">
						<option value="Teacher">I'm a Teacher</option>
						<option value="Student" selected>I'm a Student</option>
					</select>
					<label for="position">Sign Up as</label>
				</div>
				<div style="display: flex;flex-direction: row;">
					<div style="margin-right: 10px;" class="l_s_form">    
						<input id="name" name="name" type="text" required>    
						<label for="name">Name</label>  
					</div>  
					<div style="position: relative;" class="l_s_form">    
						<input id="lastname" name="lastname" type="text" style="background-color: none;" required>    
						<label for="lastname">Lastname</label>  
					</div>
				</div>   
				<div class="l_s_form">  
					<input id="email" name="email" type="text" required>    
					<label for="email">Email</label>  
				</div>   
				<div class="l_s_form">    
					<input id="password" name="password" type="password"required>    
					<label for="password">Password</label>  
				</div>
				<h3 style="margin-top: 15px;"></h3> 
				<p style="color: var(--darkFont);font-weight: bold;font-size: 13px;padding: 10px 0;">
					Birthday
				</p> 
				<div style="display: flex;flex-direction: row;margin:5px auto;">
					<div style="width: 32%;margin-right: 7px;">
						<select name="birth_month">
							<option value="0">Month</option>
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">May</option>
							<option value="6">Jun</option>
							<option value="7">Jul</option>
							<option value="8" selected="1">Aug</option>
							<option value="9">Sep</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
						</select>
					</div>
					<div style="width: 32%;margin-right: 7px;">
						<select name="birth_day">
						<option value="0">Day</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9" selected="1">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					</div>
					<div style="width: 32%;">
						<select name="birth_year">
							<option value="0">Year</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993" selected="1">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
						</select>
					</div>
				</div> 
				<div class="gender">    
					<input type="radio" name="gender" value="Female"><span style="margin-right: 15px;color: var(--darkFont);font-weight: bold;font-size: 13px;">Female</span>
					<input type="radio" name="gender" value="Male" checked><span style="color: var(--darkFont);font-weight: bold;font-size: 13px;">Male</span>  
				</div>
				<div>
					<button id="subBtn" type="submit" name="submit">Create Account</button>
				</div>  
			</form>			
		</div>
		<?php 
			}else{
				header("Location: /timeline.php?page=timeline");
			}
			?>
	</main>
<?php
	include 'footer.php';
	?>