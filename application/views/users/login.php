<form action="../users/login" method="post">

<input type="email" required placeholder="email address" name="email_address"> <br><br>
<input type="password" required placeholder="password" name="password" > <br><br>
<input type="submit" value="Login" name = "login">


<br>

</form>

<?php

	if(isset($error))
		echo $error;

?>

<br>
<br>

<a href = "../users/add"> Register </a>