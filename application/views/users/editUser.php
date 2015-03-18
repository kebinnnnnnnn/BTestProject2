<form action="../users/edit" method="post">

<input type="hidden" name="id" value = "<?php echo $_POST['id'];  ?>"> <br>
<input type="text" placeholder="email address" name="email_address" value = "<?php echo $_POST['email_address'];  ?>"> <br><br>
<input type="text" placeholder="first name" name="first_name" value = "<?php echo $_POST['first_name'];  ?>"> <br><br>
<input type="text" placeholder="middle name" name="middle_name" value = "<?php echo $_POST['middle_name'];  ?>"> <br><br>
<input type="text" placeholder="last name" name="last_name" value = "<?php echo $_POST['last_name'];  ?>"> <br><br>
<input type="text" placeholder="address" name="address" value = "<?php echo $_POST['address'];  ?>"> <br><br>
<input type="text" placeholder="contact number" name="contact_number" value = "<?php echo $_POST['contact_number'];  ?>"> <br><br>
<input type="submit" value="Edit">


<br>

</form>