<?php
	if(!empty($_POST['skey']) && !empty($_POST['nam'])){
		SetSecretKey($_POST['nam'], $_POST['skey']);
	?>
	
	<!-- Thankyou message starts -->
	<div class="mainConsole" style="width:70%; margin:auto auto; margin-top:50px;">
		<div class="header">Thankyou - <?php print $logo; ?></div>
		<div class="sin">
			Thankyou, you are now ready to <?php print $logo; ?> :) <a href="" class="playsub ready">Continue &gt;</a>
		</div>
	</div>
	<!-- Thankyou message ends -->

	<?php
	} else {
	?>

	<!-- User Settings Starts -->
	<div class="mainConsole" style="width:70%; margin:auto auto; margin-top:50px;">
		<div class="header">Welcome to <?php print $logo; ?></div>
		<div class="sin">
			<?php print $logo; ?> is a browser based tool only used in offline workspaces to instantly code in PHP, PHP based Databases, JavaScript,  JavaScript Libraries and also HTML, CSS<br>
			<b>NOTE</b> that <?php print $logo; ?> is still not compatible or secure to use in production servers.
		</div>
	</div>

	<div class="mainConsole" style="width:70%; margin:auto auto; margin-top:50px;">
		<div class="header">User Settings</div>
		<div class="sin">
			To add an extra layer of your local-development security it will ask for this <b>Secret Key</b><br>
			You can hard-code the Secret Key later if required.<br>

			<form action="index.php" method="post">
				<input type="text" name="nam" placeholder="Your Name">
				<input name="skey" type="password" placeholder="Secret Key">
				<button class="playsub" type="submit">Save Settings</button>
			</form>
			<span style="color:#765bc6; font-size:12px;"><i class="fa fa-asterisk"></i> all fields are required.</span>
		</div>
	</div>
	<!-- User Settings Ends -->

	<?php
	}
?>