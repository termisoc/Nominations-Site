<?php
	// define an array of the fields to validate against.
	$validations = array('name' => 0, 
							'email' => 0, 
							'position' => 0, 
							'second' => 0);
	
	if (isset($_POST['name'])) {
		// check the posted values to see if they validate
		// if they don't, flag it.
		if ($_POST['name'] == "") {
			$validations['name'] = 1;
		}
		if ($_POST['email'] == "") {
			$validations['email'] = 1;
		}
		if ($_POST['position'] == "") {
			$validations['position'] = 1;
		}
		if ($_POST['second'] == "") {
			$validations['second'] = 1;
		}
		if ($validations['name'] == 0) {
			// open database connection
			// Connect to the database
			mysql_connect(DBHOST, DBUSER, DBPASS) or die(mysql_error());
			mysql_select_db(DB) or die(mysql_error());
			// protect against injection
			$name = mysql_real_escape_string($_POST['name']);
			$email = mysql_real_escape_string($_POST['email']);
			$position = mysql_real_escape_string($_POST['position']);
			$second = mysql_real_escape_string($_POST['second']);
			// insert rows
			mysql_query("INSERT INTO nominations ('name', 'email', 'position', 'second') VALUES (\"{$name}\", \"{$email}\", \"{$position}\", \"{$second}\")") or die(mysql_error());
			// redirect back
			header("Location: index.php?submitted");
			exit();
		}
	} 
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>TermiSoc</title>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="styles.css" />
		<meta name="viewport" content="width=device-width; initial-scale=1"/>
		<!-- Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, 
			but keep in mind that it will disable user-zooming completely. Bad for accessibility. -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>-->
	</head>

	<body>
		<header>
			<h1>TermiSoc</h1>
			<p><em>The University of Plymouth Computing Society</em></p>
		</header>
		
		<section>
			<hr>
			<article>
				<header>
					<?php
						if (isset($_GET['submitted'])) {
							echo "<h2 class='center'>Your Application was Submitted.</h2>";
						} else {
							echo "<h2 class='center'>Exec Nominations Now Open!</h2>";
						}
					
					?>
				</header>
				<p>Would you like to run the society for the 2011-2012 academic year? If so, fill in the form below, and we'll put you on the ballot for the AGM.</p>
				
				<form action="index.php" method="post" accept-charset="utf-8">
					<fieldset>
					<ol>
						<li>
							<label for="name">Your Name:</label>
							<input type="text" name="name" value="">
							<?php
								if ($validations['name']) {
									echo "<span class='small warning'><em>We need your name.</em></span>";
								}
							?>
						</li>
						<li>
							<label for="email">Your Email:</label>
							<input type="text" name="email" value="">
							<?php
								if ($validations['email']) {
									echo "<span class='small warning'><em>We need your email.</em></span>";
								} ?>
						</li>
						<li>
							<label for="position">Position:</label>
							<select name="position">
								<option value="">Please select...</option>
								<option value="chair">Chairman</option>
								<option value="secretary">Secretary</option>
								<option value="treasurer">Treasurer</option>
								<option value="safety">Safety Officer</option>
								<option value="tech">Tech Officer</option>
								<option value="gaming">Gaming Officer</option>
							</select>
							<?php
								if ($validations['position']) {
									echo "<span class='small warning'><em>You need to specify the position.</em></span>";
								} ?>
						</li>
						<li>
							<label for="second">Someone to Second You:</label>
							<input type="text" name="second" value="">
						</li>
						<?php
							if ($validations['second']) {
								echo "<span class='small warning'><em>I'm sure someone agrees with you.</em></span>";
							} ?>
						<li>
							<p class="small"><em>Please nominate yourself multiple times if you wish to go for multiple positions.</em></p>
						</li>
						<li>
							<button type="submit">Submit</button>
						</li>
					</ol>
					</fieldset>
				</form>
			</article>
			<hr>
		</section>
		
		<footer>
			<p>Content &copy; TermiSoc 2011. Fork Me on GitHub.</p>
		</footer>
	</body>
</html>
