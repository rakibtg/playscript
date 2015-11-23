<?php
	if(isset($_POST['doUpdate'])){
		copy("http://api.cdnjs.com/libraries?fields=description,homepage", "cdnjs.json");

		// write the current time in cheked_at.time file. So we can later
		// display when cdn library was last updatted.
		// lets keep it simple :-)
		file_put_contents("cheked_at.time", time());
		sleep(1);
		echo "updated";
	}
?>