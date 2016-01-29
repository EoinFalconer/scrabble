<?php
							 $con = mysqli_connect( 'localhost', 'ben', 'ireland1234', 'GMF');
							//$con = mysqli_connect( 'localhost', 'bitie_ben', 'ireland1234!', 'bitie_GMF_NEW');  
							// Check connectionitie
							if (mysqli_connect_errno()) {
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
?>