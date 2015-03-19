<form action="../users/update" method="post">

<input type="hidden" name="id" value = "<?php echo trim($_POST['id']);  ?>"> <br>
<input type="email" required placeholder="email address" name="email_address" value = "<?php echo trim($_POST['email_address']);  ?>"> <br><br>
<input type="text"  required placeholder="first name" name="first_name" value = "<?php echo trim($_POST['first_name']);  ?>"> <br><br>
<input type="text"  required placeholder="middle name" name="middle_name" value = "<?php echo trim($_POST['middle_name']);  ?>"> <br><br>
<input type="text"  required placeholder="last name" name="last_name" value = "<?php echo trim($_POST['last_name']);  ?>"> <br><br>
<input type="text"  required placeholder="address" name="address" value = "<?php echo trim($_POST['address']);  ?>"> <br><br>
<input type="number"  required placeholder="contact number" name="contact_number" value = "<?php echo trim($_POST['contact_number']);  ?>"> <br><br>

type: <select name = "type">
  <option value="user" <?php if(trim($_POST['type']) == 'user') echo 'selected' ?>; >user</option>
  <option value="admin"  <?php if(trim($_POST['type']) == 'admin') echo 'selected'; ?> >admin</option>
</select><br><br>
<input type="submit" value="Update" name = "submit">


<br>

</form>