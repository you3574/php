<?php

//session_start();
//$conn->close();
if(session_destroy())
{
		
	
	header("Location: ../index.html");
}

?>

