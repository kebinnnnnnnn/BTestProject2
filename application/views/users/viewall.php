
<a href = "../contacts/viewall">View Contacts</a>

<br><br>
<hr>

<?php $number = 0; ?>

<?php foreach ($todo as $todoitem):?>
	<?php

	echo '
			<form action="../users/update" method="post">
			<input type="hidden" value = " '. $todoitem['User']['id'] .' " name="id"> 
			<input type="hidden" value = " '. $todoitem['User']['email_address'] .' " name="email_address"> 
			<input type="hidden" value = " '. $todoitem['User']['first_name']  .'   " name="first_name"> 
			<input type="hidden" value = " '. $todoitem['User']['middle_name'] .' " name="middle_name"> 
			<input type="hidden" value = " '. $todoitem['User']['last_name']  .'   " name="last_name"> 
			<input type="hidden" value = " '. $todoitem['User']['address']  .'   " name="address"> 
			<input type="hidden" value = " '. $todoitem['User']['contact_number']  .'   " name="contact_number"> 
			<input type="hidden" value = " '. $todoitem['User']['type']  .'   " name="type"> 
			<input type="submit" value="Edit" name ="edit">
			</form>
		';

	echo '
		<form action="../users/delete" method="post">
		<input type="hidden" value = " '. $todoitem['User']['id'] .' " name="id"> 
		<input type="submit" value="Delete" name = "submit">
		</form>
	';

	
		?>
	<h3>
	<?php  

	   echo $todoitem['User']['first_name'] . ' '; 
	   echo $todoitem['User']['middle_name']  . ' '; 
	   echo $todoitem['User']['last_name']  . ' '; 

	
	?>
	</h3>

	<span class="item">

	</span>
	
	<br><br>
	<hr>
<?php endforeach?>
