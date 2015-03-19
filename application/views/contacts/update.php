<form action="../contacts/update" method="post">

<input type="hidden" name="id" value = "<?php echo trim($_POST['id']);  ?>"> <br>
<input type="text" required placeholder="name" name="name" value = "<?php echo trim($_POST['name']);  ?>"> <br><br>
<input type="number" required placeholder="phone_number" name="phone_number" value = "<?php echo trim($_POST['phone_number']);  ?>"> <br><br>
<input type="text" required placeholder="address" name="address" value = "<?php echo trim($_POST['address']);  ?>"> <br><br>

<input type="submit" value="Update" name = "submit">


<br>

</form>