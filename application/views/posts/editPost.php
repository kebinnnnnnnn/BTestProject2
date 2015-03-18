<form action="../posts/edit" method="post">

<input type="hidden" name="id" value = "<?php echo $_POST['id'];  ?>"> <br>
<input type="text" placeholder="Title" name="title" value = "<?php echo $_POST['title'];  ?>"> <br>
<br>
<textarea rows="4" cols="50" name = "description">

<?php 

echo $_POST['description'];

?>
</textarea>
<br>
<input type="submit" value="Post">
</form>