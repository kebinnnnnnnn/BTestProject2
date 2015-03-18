
<a href = "../posts/addPost">Add a post</a>
<br><br><br>
<hr>

<?php $number = 0; ?>

<?php foreach ($todo as $todoitem):?>
	<?php

	if( $uid == $todoitem['Post']['user_id'] || $userType == "admin")
	{

	echo '
			<form action="../posts/editPost" method="post">
			<input type="hidden" value = " '. $todoitem['Post']['id'] .' " name="id"> 
			<input type="hidden" value = " '. $todoitem['Post']['title'] .' " name="title"> 
			<input type="hidden" value = " '. $todoitem['Post']['body']  .'   " name="description"> 
			<input type="submit" value="Edit">
			</form>
		';

	echo '
		<form action="../posts/delete" method="post">
		<input type="hidden" value = " '. $todoitem['Post']['id'] .' " name="id"> 
		<input type="submit" value="Delete">
		</form>
	';

	}
		?>


	<h3>
	<?php  echo $todoitem['Post']['title']; 

	
	?>
	</h3>

	<span class="item">

	</span>
	</a><br/>

	<?php echo $todoitem['Post']['body']?>
	<br><br>
	<hr>
<?php endforeach?>
