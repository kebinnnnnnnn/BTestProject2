<br><br>

<a href = "../contacts/add">Add a Contact</a> <br>
<a href = "../users/info">View Account</a><br>

<?php if($_SESSION['type'] == 'admin'){ ?>
<a href = "../users/viewall">View Users</a> 
<?php }?>

<hr>

<?php $number = 0; ?>

<?php foreach ($todo as $todoitem):?>
	<?php

	echo '
			<form action="../contacts/update" method="post">
			<input type="hidden" value = " '. $todoitem['Contact']['id'] .' " name="id"> 
			<input type="hidden" value = " '. $todoitem['Contact']['user_id'] .' " name="user_id"> 
			<input type="hidden" value = " '. $todoitem['Contact']['name']  .'   " name="name"> 
			<input type="hidden" value = " '. $todoitem['Contact']['phone_number'] .' " name="phone_number"> 
			<input type="hidden" value = " '. $todoitem['Contact']['address']  .'   " name="address"> 
			<input type="submit" value="Edit" name ="edit">
			</form>
		';

	echo '
		<form action="../contacts/delete" method="post">
		<input type="hidden" value = " '. $todoitem['Contact']['id'] .' " name="id"> 
		<input type="submit" value="Delete" name = "submit">
		</form>
	';

	
		?>
	<h3>
	<?php  

	   echo $todoitem['Contact']['name'] . ' '; 
	   echo $todoitem['Contact']['phone_number']  . ' '; 
	   echo $todoitem['Contact']['address']  . ' '; 

	
	?>
	</h3>

	<span class="item">

	</span>
	
	<br><br>
	<hr>
<?php endforeach?>
